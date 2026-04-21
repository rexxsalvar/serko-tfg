<?php

namespace App\Rules;

use App\Models\Event;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AvailableEventSeats implements ValidationRule
{
    public function __construct(private readonly int $eventId) {}

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! is_array($value) || $value === []) {
            return;
        }

        $event = Event::query()->find($this->eventId);

        if (! $event) {
            return;
        }

        $requestedSeatIds = collect($value)
            ->map(fn (mixed $seatId) => (int) $seatId)
            ->unique()
            ->values();

        $availableCount = $event->seats()
            ->wherePivot('status', 'available')
            ->whereIn('seats.id', $requestedSeatIds)
            ->count();

        if ($availableCount !== $requestedSeatIds->count()) {
            $fail(__('serko.validation.seat_unavailable'));
        }
    }
}
