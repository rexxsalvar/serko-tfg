<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TicketController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $tickets = Ticket::query()
            ->with(['event.homeTeam', 'event.awayTeam', 'seat', 'order'])
            ->userTickets($request->user())
            ->paginate(15);

        return TicketResource::collection($tickets);
    }

    public function show(Ticket $ticket): TicketResource
    {
        $this->authorize('view', $ticket);

        return new TicketResource($ticket->load(['event.homeTeam', 'event.awayTeam', 'seat', 'order']));
    }
}
