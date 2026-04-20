<?php

namespace App\Models;

use Database\Factories\StadiumFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stadium extends Model
{
    /** @use HasFactory<StadiumFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'city',
        'capacity',
        'image',
    ];

    protected function casts(): array
    {
        return [
            'capacity' => 'integer',
        ];
    }

    public function sectors(): HasMany
    {
        return $this->hasMany(Sector::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function scopeUpcomingEvents(Builder $query): Builder
    {
        return $query->whereHas('events', fn (Builder $builder) => $builder->upcomingEvents());
    }
}
