<?php

namespace App\Models;

use Database\Factories\EventFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    /** @use HasFactory<EventFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'stadium_id',
        'competition_id',
        'home_team_id',
        'away_team_id',
        'date',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'datetime',
        ];
    }

    public function stadium(): BelongsTo
    {
        return $this->belongsTo(Stadium::class);
    }

    public function competition(): BelongsTo
    {
        return $this->belongsTo(Competition::class);
    }

    public function homeTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    public function awayTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }

    public function seats(): BelongsToMany
    {
        return $this->belongsToMany(Seat::class)
            ->using(EventSeat::class)
            ->withPivot(['id', 'price', 'status'])
            ->withTimestamps();
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function scopeUpcomingEvents(Builder $query): Builder
    {
        return $query->where('date', '>=', now())->orderBy('date');
    }

    public function scopeAvailableSeats(Builder $query): Builder
    {
        return $query->whereHas('seats', fn (Builder $builder) => $builder->where('event_seat.status', 'available'));
    }
}
