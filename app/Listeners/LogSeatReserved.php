<?php

namespace App\Listeners;

use App\Events\SeatReserved;
use App\Jobs\SendEmailJob;
use App\Mail\SeatReservationMail;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class LogSeatReserved
{
    public function handle(SeatReserved $event): void
    {
        Log::info('SERKO seat reserved.', [
            'event_id' => $event->event->id,
            'seat_id' => $event->seat->id,
        ]);

        User::role('Admin')->get()->each(function (User $admin) use ($event): void {
            SendEmailJob::dispatch($admin->email, SeatReservationMail::class, [
                'event' => $event->event,
                'seat' => $event->seat,
            ]);
        });
    }
}
