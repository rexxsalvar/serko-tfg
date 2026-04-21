<?php

namespace App\Services;

use App\Events\PaymentCaptured;
use App\Events\TicketPurchased;
use App\Models\Event;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Seat;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CheckoutService
{
    public function __construct(private readonly PayPalService $payPalService) {}

    public function purchase(User $user, Event $event, array $seatIds, string $paypalOrderId): Order
    {
        return DB::transaction(function () use ($user, $event, $seatIds, $paypalOrderId): Order {
            $capture = $this->payPalService->capture($paypalOrderId);

            $selectedSeats = Seat::query()
                ->availableSeats($event)
                ->whereIn('id', $seatIds)
                ->lockForUpdate()
                ->get();

            abort_unless($selectedSeats->count() === count($seatIds), 422, __('serko.validation.seat_unavailable'));

            $seatPricing = $event->seats()
                ->whereIn('seats.id', $seatIds)
                ->get()
                ->keyBy('id');

            $total = $seatPricing->sum(fn (Seat $seat) => $seat->pivot->price);

            $order = Order::query()->create([
                'user_id' => $user->id,
                'total_price' => $total,
                'status' => 'paid',
            ]);

            $payment = Payment::query()->create([
                'order_id' => $order->id,
                'method' => 'paypal',
                'status' => strtolower(data_get($capture, 'status', 'completed')),
                'transaction_id' => data_get($capture, 'id', $paypalOrderId),
            ]);

            event(new PaymentCaptured($payment));

            foreach ($selectedSeats as $seat) {
                $price = $seatPricing[$seat->id]->pivot->price;

                $order->tickets()->create([
                    'event_id' => $event->id,
                    'seat_id' => $seat->id,
                    'qr_code' => base64_encode(QrCode::format('svg')->size(220)->generate(Str::uuid()->toString())),
                    'price' => $price,
                ]);

                $event->seats()->updateExistingPivot($seat->id, ['status' => 'sold']);
            }

            $order->load('user', 'tickets.event.homeTeam', 'tickets.event.awayTeam', 'tickets.seat');

            event(new TicketPurchased($order));

            return $order;
        });
    }
}
