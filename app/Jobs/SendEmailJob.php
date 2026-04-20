<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Queueable;

    public function __construct(
        private readonly string $recipient,
        private readonly string $mailableClass,
        private readonly array $payload = [],
    ) {
    }

    public function handle(): void
    {
        $mailable = app($this->mailableClass, $this->payload);

        Mail::to($this->recipient)->send($mailable);
    }
}
