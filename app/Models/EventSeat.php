<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EventSeat extends Pivot
{
    protected $table = 'event_seat';

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
