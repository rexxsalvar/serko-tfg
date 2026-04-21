<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Event;
use App\Models\Order;
use App\Services\CheckoutService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request): View
    {
        $orders = Order::query()
            ->with(['payment', 'tickets.event.homeTeam', 'tickets.event.awayTeam', 'tickets.seat'])
            ->where('user_id', $request->user()->id)
            ->latest()
            ->paginate(8);

        return view('orders.index', compact('orders'));
    }

    public function checkout(Event $event): View
    {
        $event->load(['stadium', 'homeTeam', 'awayTeam', 'seats.sector']);

        return view('orders.checkout', compact('event'));
    }

    public function store(StoreOrderRequest $request, CheckoutService $checkoutService): RedirectResponse
    {
        $event = Event::query()->findOrFail($request->integer('event_id'));

        $order = $checkoutService->purchase(
            $request->user(),
            $event,
            array_map('intval', $request->input('seat_ids', [])),
            $request->string('paypal_order_id')->toString(),
        );

        return redirect()
            ->route('orders.show', $order)
            ->with('status', __('serko.orders.completed'));
    }

    public function show(Order $order): View
    {
        $this->authorize('view', $order);
        $order->load('tickets.event.homeTeam', 'tickets.event.awayTeam', 'tickets.seat', 'payment');
        abort_if($order->tickets->isEmpty(), 404);

        return view('orders.show', compact('order'));
    }
}
