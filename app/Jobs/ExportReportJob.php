<?php

namespace App\Jobs;

use App\Events\ReportExported;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;

class ExportReportJob implements ShouldQueue
{
    use Queueable;

    public function __construct(private readonly string $type) {}

    public function handle(): void
    {
        $path = "reports/{$this->type}-queued-report.txt";

        Storage::disk('local')->put($path, 'SERKO queued report generated at '.now()->toIso8601String());

        event(new ReportExported($this->type, $path));
    }
}
