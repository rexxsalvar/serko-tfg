<?php

namespace App\Console\Commands;

use App\Jobs\ExportReportJob;
use Illuminate\Console\Command;

class ExportOperationsReportCommand extends Command
{
    protected $signature = 'serko:export-operations-report {type=sales : Report type: sales or events}';

    protected $description = 'Queue an operations export report.';

    public function handle(): int
    {
        $type = (string) $this->argument('type');

        if (! in_array($type, ['sales', 'events'], true)) {
            $this->error('Invalid report type.');

            return self::FAILURE;
        }

        ExportReportJob::dispatch($type);

        $this->info("Queued {$type} operations report.");

        return self::SUCCESS;
    }
}
