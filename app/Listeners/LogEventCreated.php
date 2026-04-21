<?php

namespace App\Listeners;

use App\Events\EventCreated;
use Illuminate\Support\Facades\Log;

class LogEventCreated
{
    public function handle(EventCreated $event): void
    {
        Log::info('SERKO event created.', [
            'event_id' => $event->event->id,
            'stadium_id' => $event->event->stadium_id,
        ]);
    }
}
