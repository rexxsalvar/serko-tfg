<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EventSeat extends Pivot
{
    protected $table = 'event_seat';

    public $incrementing = true;

    public $timestamps = true;

    protected $fillable = [
        'event_id',
        'seat_id',
        'price',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
        ];
    }
}
