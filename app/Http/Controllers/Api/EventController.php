<?php

namespace App\Http\Controllers\Api;

use App\Events\EventCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $events = Event::query()
            ->with(['stadium', 'competition', 'homeTeam', 'awayTeam'])
            ->when($request->boolean('upcoming', true), fn ($query) => $query->upcomingEvents())
            ->paginate(15);

        return response()->json($events);
    }

    public function store(StoreEventRequest $request): JsonResponse
    {
        $event = Event::query()->create($request->safe()->except('seats'));

        $payload = collect($request->validated('seats', []))->mapWithKeys(fn (array $seat) => [
            $seat['seat_id'] => ['price' => $seat['price'], 'status' => $seat['status'] ?? 'available'],
        ])->all();

        if ($payload !== []) {
            $event->seats()->sync($payload);
        }

        event(new EventCreated($event));

        return response()->json($event->load(['stadium', 'competition', 'homeTeam', 'awayTeam']), 201);
    }

    public function show(Event $event): JsonResponse
    {
        return response()->json($event->load(['stadium', 'competition', 'homeTeam', 'awayTeam', 'seats.sector']));
    }

    public function update(StoreEventRequest $request, Event $event): JsonResponse
    {
        $event->update($request->safe()->except('seats'));

        if ($request->filled('seats')) {
            $payload = collect($request->validated('seats', []))->mapWithKeys(fn (array $seat) => [
                $seat['seat_id'] => ['price' => $seat['price'], 'status' => $seat['status'] ?? 'available'],
            ])->all();

            $event->seats()->sync($payload);
        }

        return response()->json($event->refresh()->load(['stadium', 'competition', 'homeTeam', 'awayTeam']));
    }

    public function destroy(Event $event): JsonResponse
    {
        $event->delete();

        return response()->json(status: 204);
    }
}
