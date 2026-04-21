<?php

namespace App\Http\Controllers\Api;

use App\Events\EventCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EventController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $events = Event::query()
            ->with(['stadium', 'competition', 'homeTeam', 'awayTeam'])
            ->withCount(['seats as available_seats_count' => fn ($query) => $query->where('event_seat.status', 'available')])
            ->when($request->boolean('upcoming', true), fn ($query) => $query->upcomingEvents())
            ->paginate(15);

        return EventResource::collection($events);
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

        return (new EventResource($event->load(['stadium', 'competition', 'homeTeam', 'awayTeam'])))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Event $event): EventResource
    {
        return new EventResource($event->load(['stadium', 'competition', 'homeTeam', 'awayTeam', 'seats.sector']));
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

        return (new EventResource($event->refresh()->load(['stadium', 'competition', 'homeTeam', 'awayTeam'])))
            ->response();
    }

    public function destroy(Event $event): JsonResponse
    {
        $this->authorize('delete', $event);

        $event->delete();

        return response()->json(status: 204);
    }
}
