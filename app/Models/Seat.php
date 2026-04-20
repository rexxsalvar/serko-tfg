<?php

namespace App\Models;

use Database\Factories\SeatFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Seat extends Model
{
    /** @use HasFactory<SeatFactory> */
    use HasFactory;

    protected $fillable = [
        'sector_id',
        'row',
        'number',
    ];

    protected function casts(): array
    {
        return [
            'number' => 'integer',
        ];
    }

    public function sector(): BelongsTo
    {
        return $this->belongsTo(Sector::class);
    }

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class)
            ->using(EventSeat::class)
            ->withPivot(['id', 'price', 'status'])
            ->withTimestamps();
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function scopeAvailableSeats(Builder $query, Event|int $event): Builder
    {
        $eventId = $event instanceof Event ? $event->getKey() : $event;

        return $query->whereHas('events', function (Builder $builder) use ($eventId): void {
            $builder->where('events.id', $eventId)
                ->where('event_seat.status', 'available');
        });
    }
}
