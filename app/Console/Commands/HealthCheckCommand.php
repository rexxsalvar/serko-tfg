<?php

namespace App\Console\Commands;

use App\Models\Event;
use App\Models\Stadium;
use App\Models\User;
use Illuminate\Console\Command;

class HealthCheckCommand extends Command
{
    protected $signature = 'serko:health-check';

    protected $description = 'Check essential SERKO data needed for a demo.';

    public function handle(): int
    {
        $checks = [
            'users' => User::query()->exists(),
            'stadiums' => Stadium::query()->exists(),
            'events' => Event::query()->upcomingEvents()->exists(),
        ];

        foreach ($checks as $name => $ok) {
            $this->line(($ok ? '[OK]' : '[FAIL]')." {$name}");
        }

        return in_array(false, $checks, true) ? self::FAILURE : self::SUCCESS;
    }
}
