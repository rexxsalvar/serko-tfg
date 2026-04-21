<?php

namespace App\Console\Commands;

use App\Jobs\SendEventReminderJob;
use App\Models\Ticket;
use Illuminate\Console\Command;

class SendEventRemindersCommand extends Command
{
    protected $signature = 'serko:send-event-reminders {--hours=48 : Reminder window in hours}';

    protected $description = 'Queue reminder emails for tickets with upcoming events.';

    public function handle(): int
    {
        $until = now()->addHours((int) $this->option('hours'));

        $tickets = Ticket::query()
            ->whereHas('event', fn ($query) => $query->whereBetween('date', [now(), $until]))
            ->pluck('id');

        foreach ($tickets as $ticketId) {
            SendEventReminderJob::dispatch($ticketId);
        }

        $this->info("Queued {$tickets->count()} reminder emails.");

        return self::SUCCESS;
    }
}
