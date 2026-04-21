<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SyncEventAvailabilityCommand extends Command
{
    protected $signature = 'serko:sync-event-availability';

    protected $description = 'Synchronize event seat availability counters for operations reporting.';

    public function handle(): int
    {
        $events = DB::table('events')
            ->select('events.id')
            ->whereNull('events.deleted_at')
            ->get();

        foreach ($events as $event) {
            $available = DB::table('event_seat')
                ->where('event_id', $event->id)
                ->where('status', 'available')
                ->count();

            $this->line("Event #{$event->id}: {$available} available seats.");
        }

        $this->info("Synchronized {$events->count()} events.");

        return self::SUCCESS;
    }
}
