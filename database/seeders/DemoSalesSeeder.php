<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Seeder;

class DemoSalesSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedReservedSeats();

        $this->seedPaidOrder(
            email: 'user@serko.test',
            stadium: 'Santiago Bernabeu',
            homeTeam: 'Real Madrid',
            awayTeam: 'FC Barcelona',
            transactionId: 'SERKO-DEMO-001',
            ticketCount: 2,
        );

        $this->seedPaidOrder(
            email: 'client@serko.test',
            stadium: 'Camp Nou',
            homeTeam: 'FC Barcelona',
            awayTeam: 'Valencia CF',
            transactionId: 'SERKO-DEMO-002',
            ticketCount: 1,
        );

        $this->seedPaidOrder(
            email: 'manager@serko.test',
            stadium: 'Metropolitano',
            homeTeam: 'Atletico de Madrid',
            awayTeam: 'Real Betis',
            transactionId: 'SERKO-DEMO-003',
            ticketCount: 2,
        );

        $this->seedPaidOrder(
            email: 'support@serko.test',
            stadium: 'Metropolitano',
            homeTeam: 'Sevilla FC',
            awayTeam: 'Real Madrid',
            transactionId: 'SERKO-DEMO-004',
            ticketCount: 1,
        );

        $this->seedOrder('auditor@serko.test', 24.90, 'pending');
        $this->seedOrder('user@serko.test', 0.00, 'cancelled');
    }

    private function seedReservedSeats(): void
    {
        $event = Event::query()
            ->with(['stadium.sectors.seats'])
            ->whereHas('stadium', fn ($query) => $query->where('name', 'Camp Nou'))
            ->whereHas('homeTeam', fn ($query) => $query->where('name', 'Valencia CF'))
            ->whereHas('awayTeam', fn ($query) => $query->where('name', 'Atletico de Madrid'))
            ->firstOrFail();

        $reservedSeats = $event->seats->filter(fn ($seat) => $seat->pivot->status === 'available')->take(4);

        foreach ($reservedSeats as $seat) {
            $event->seats()->updateExistingPivot($seat->id, [
                'status' => 'reserved',
            ]);
        }
    }

    private function seedPaidOrder(string $email, string $stadium, string $homeTeam, string $awayTeam, string $transactionId, int $ticketCount): void
    {
        $user = User::query()->where('email', $email)->firstOrFail();

        $event = Event::query()
            ->with(['seats.sector', 'stadium', 'homeTeam', 'awayTeam'])
            ->whereHas('stadium', fn ($query) => $query->where('name', $stadium))
            ->whereHas('homeTeam', fn ($query) => $query->where('name', $homeTeam))
            ->whereHas('awayTeam', fn ($query) => $query->where('name', $awayTeam))
            ->firstOrFail();

        $payment = Payment::query()->with('order')->where('transaction_id', $transactionId)->first();

        if (! $payment) {
            $availableSeats = $event->seats->filter(fn ($seat) => $seat->pivot->status === 'available')->take($ticketCount);

            if ($availableSeats->count() < $ticketCount) {
                return;
            }

            $totalPrice = (float) number_format(
                $availableSeats->sum(fn ($seat) => (float) $seat->pivot->price),
                2,
                '.',
                ''
            );

            $order = Order::query()->create([
                'user_id' => $user->id,
                'total_price' => $totalPrice,
                'status' => 'paid',
            ]);

            $payment = Payment::query()->create([
                'order_id' => $order->id,
                'method' => 'paypal',
                'status' => 'completed',
                'transaction_id' => $transactionId,
            ]);

            foreach ($availableSeats as $seat) {
                Ticket::query()->create([
                    'order_id' => $order->id,
                    'event_id' => $event->id,
                    'seat_id' => $seat->id,
                    'qr_code' => base64_encode("{$transactionId}-{$seat->id}"),
                    'price' => $seat->pivot->price,
                ]);

                $event->seats()->updateExistingPivot($seat->id, [
                    'status' => 'sold',
                ]);
            }

            return;
        }

        if ($payment->order) {
            return;
        }
    }

    private function seedOrder(string $email, float $totalPrice, string $status): void
    {
        $user = User::query()->where('email', $email)->firstOrFail();

        Order::query()->firstOrCreate(
            [
                'user_id' => $user->id,
                'status' => $status,
                'total_price' => $totalPrice,
            ],
            [
                'user_id' => $user->id,
                'status' => $status,
                'total_price' => $totalPrice,
            ],
        );
    }
}
