<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ReleaseReservedSeatsCommand extends Command
{
    protected $signature = 'serko:release-reserved-seats {--dry-run : Show how many seats would be released without changing data}';

    protected $description = 'Release reserved seats for future events back to available.';

    public function handle(): int
    {
        $query = DB::table('event_seat')
            ->join('events', 'events.id', '=', 'event_seat.event_id')
            ->where('event_seat.status', 'reserved')
            ->whereNull('events.deleted_at')
            ->where('events.date', '>', now());

        $count = (clone $query)->count();

        if ($this->option('dry-run')) {
            $this->info("Reserved seats ready to release: {$count}");

            return self::SUCCESS;
        }

        $query->update([
            'event_seat.status' => 'available',
            'event_seat.updated_at' => now(),
        ]);

        $this->info("Released reserved seats: {$count}");

        return self::SUCCESS;
    }
}
