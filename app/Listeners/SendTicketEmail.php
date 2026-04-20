<?php

namespace App\Listeners;

use App\Events\TicketPurchased;
use App\Jobs\GeneratePdfJob;
use App\Jobs\SendEmailJob;
use App\Mail\PurchaseConfirmationMail;

class SendTicketEmail
{
    public function handle(TicketPurchased $event): void
    {
        GeneratePdfJob::dispatch($event->order->id, 'ticket');
        GeneratePdfJob::dispatch($event->order->id, 'invoice');

        SendEmailJob::dispatch(
            $event->order->user->email,
            PurchaseConfirmationMail::class,
            ['order' => $event->order->load('tickets.event.homeTeam', 'tickets.event.awayTeam', 'tickets.seat')]
        );
    }
}
