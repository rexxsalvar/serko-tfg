<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrderController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $query = $request->user()->isBackoffice()
            ? Order::query()
            : $request->user()->orders();

        return OrderResource::collection(
            $query
                ->with(['payment', 'tickets.event.homeTeam', 'tickets.event.awayTeam', 'tickets.seat'])
                ->latest()
                ->paginate(15)
        );
    }

    public function show(Order $order): OrderResource
    {
        $this->authorize('view', $order);

        return new OrderResource(
            $order->load(['payment', 'tickets.event.homeTeam', 'tickets.event.awayTeam', 'tickets.seat'])
        );
    }
}
