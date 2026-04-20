<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $tickets = Ticket::query()
            ->with(['event.homeTeam', 'event.awayTeam', 'seat', 'order'])
            ->userTickets($request->user())
            ->paginate(15);

        return response()->json($tickets);
    }

    public function show(Ticket $ticket): JsonResponse
    {
        $this->authorize('view', $ticket);

        return response()->json($ticket->load(['event.homeTeam', 'event.awayTeam', 'seat', 'order']));
    }
}
