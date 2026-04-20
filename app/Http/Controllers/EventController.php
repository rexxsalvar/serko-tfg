<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request): View
    {
        $events = Event::query()
            ->with(['stadium', 'competition', 'homeTeam', 'awayTeam'])
            ->upcomingEvents()
            ->when($request->string('search')->isNotEmpty(), function ($query) use ($request): void {
                $search = $request->string('search');

                $query->where(function ($builder) use ($search): void {
                    $builder->whereHas('homeTeam', fn ($teamQuery) => $teamQuery->where('name', 'like', "%{$search}%"))
                        ->orWhereHas('awayTeam', fn ($teamQuery) => $teamQuery->where('name', 'like', "%{$search}%"))
                        ->orWhereHas('stadium', fn ($stadiumQuery) => $stadiumQuery->where('name', 'like', "%{$search}%"));
                });
            })
            ->paginate(9)
            ->withQueryString();

        return view('events.index', compact('events'));
    }

    public function show(Event $event): View
    {
        $event->load([
            'stadium.sectors.seats',
            'competition',
            'homeTeam',
            'awayTeam',
            'seats.sector',
        ]);

        return view('events.show', compact('event'));
    }
}
