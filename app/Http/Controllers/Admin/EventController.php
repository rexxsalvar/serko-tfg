<?php

namespace App\Http\Controllers\Admin;

use App\Events\EventCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Models\Competition;
use App\Models\Event;
use App\Models\Seat;
use App\Models\Stadium;
use App\Models\Team;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class EventController extends Controller
{
    public function index(): View
    {
        $events = Event::query()->with(['stadium', 'competition', 'homeTeam', 'awayTeam'])->paginate(15);

        return view('admin.events.index', compact('events'));
    }

    public function create(): View
    {
        return view('admin.events.form', $this->formData(new Event()));
    }

    public function store(StoreEventRequest $request): RedirectResponse
    {
        $event = Event::query()->create($request->safe()->except('seats'));

        $this->syncSeats($event, $request->validated('seats', []));

        event(new EventCreated($event));

        return redirect()->route('admin.events.index')->with('status', __('serko.events.created'));
    }

    public function show(Event $event): View
    {
        $event->load('stadium', 'competition', 'homeTeam', 'awayTeam', 'seats.sector');

        return view('admin.events.show', compact('event'));
    }

    public function edit(Event $event): View
    {
        $event->load('seats');

        return view('admin.events.form', $this->formData($event));
    }

    public function update(StoreEventRequest $request, Event $event): RedirectResponse
    {
        $event->update($request->safe()->except('seats'));
        $this->syncSeats($event, $request->validated('seats', []));

        return redirect()->route('admin.events.index')->with('status', __('serko.events.updated'));
    }

    public function destroy(Event $event): RedirectResponse
    {
        $event->delete();

        return back()->with('status', __('serko.events.deleted'));
    }

    private function formData(Event $event): array
    {
        return [
            'event' => $event,
            'stadiums' => Stadium::query()->orderBy('name')->get(),
            'competitions' => Competition::query()->orderBy('name')->get(),
            'teams' => Team::query()->orderBy('name')->get(),
            'seatCatalogue' => Seat::query()->with('sector.stadium')->get()->groupBy(fn (Seat $seat) => $seat->sector->stadium->name),
        ];
    }

    private function syncSeats(Event $event, array $seats): void
    {
        if ($seats === []) {
            return;
        }

        $payload = collect($seats)->mapWithKeys(fn (array $seat) => [
            $seat['seat_id'] => [
                'price' => $seat['price'],
                'status' => $seat['status'] ?? 'available',
            ],
        ])->all();

        $event->seats()->sync($payload);
    }
}
