<?php

namespace App\Models;

use Database\Factories\SectorFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sector extends Model
{
    /** @use HasFactory<SectorFactory> */
    use HasFactory;

    protected $fillable = [
        'stadium_id',
        'name',
        'type',
    ];

    public function stadium(): BelongsTo
    {
        return $this->belongsTo(Stadium::class);
    }

    public function seats(): HasMany
    {
        return $this->hasMany(Seat::class);
    }
}
