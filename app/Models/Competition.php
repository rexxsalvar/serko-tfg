<?php

namespace App\Models;

use Database\Factories\CompetitionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Competition extends Model
{
    /** @use HasFactory<CompetitionFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
