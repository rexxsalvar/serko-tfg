<?php

namespace App\Events;

use App\Models\Event;
use App\Models\Seat;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SeatReserved
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public Event $event,
        public Seat $seat,
    ) {}
}
