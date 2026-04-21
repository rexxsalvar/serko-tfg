<?php

namespace App\Listeners;

use App\Events\ReportExported;
use App\Jobs\SendEmailJob;
use App\Mail\AdminReportMail;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class LogReportExported
{
    public function handle(ReportExported $event): void
    {
        Log::info('SERKO report exported.', [
            'type' => $event->type,
            'path' => $event->path,
        ]);

        User::role('Auditor')->get()->each(function (User $auditor) use ($event): void {
            SendEmailJob::dispatch($auditor->email, AdminReportMail::class, [
                'type' => $event->type,
                'path' => $event->path,
            ]);
        });
    }
}
