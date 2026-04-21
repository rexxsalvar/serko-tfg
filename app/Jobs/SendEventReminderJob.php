<?php

namespace App\Jobs;

use App\Mail\EventReminderMail;
use App\Models\Ticket;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendEventReminderJob implements ShouldQueue
{
    use Queueable;

    public function __construct(private readonly int $ticketId) {}

    public function handle(): void
    {
        $ticket = Ticket::query()->with('order.user', 'event.homeTeam', 'event.awayTeam', 'seat')->findOrFail($this->ticketId);

        Mail::to($ticket->order->user->email)->send(new EventReminderMail($ticket));
    }
}
