<?php

namespace App\Jobs;

use App\Services\TelegramNotifier;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendTelegramNotificationJob implements ShouldQueue
{
    use Queueable;

    public function __construct(private readonly string $message) {}

    public function handle(TelegramNotifier $telegramNotifier): void
    {
        $telegramNotifier->send($this->message);
    }
}
