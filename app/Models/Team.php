<?php

namespace App\Models;

use Database\Factories\TeamFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    /** @use HasFactory<TeamFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
    ];

    public function homeEvents(): HasMany
    {
        return $this->hasMany(Event::class, 'home_team_id');
    }

    public function awayEvents(): HasMany
    {
        return $this->hasMany(Event::class, 'away_team_id');
    }
}
