<?php

namespace App\Listeners;

use App\Events\TicketPurchased;
use App\Services\TelegramNotifier;
use Illuminate\Support\Facades\Log;

class LogPurchase
{
    public function __construct(private readonly TelegramNotifier $telegramNotifier)
    {
    }

    public function handle(TicketPurchased $event): void
    {
        $message = sprintf(
            'Nueva compra SERKO: pedido #%d por %s (%s EUR).',
            $event->order->id,
            $event->order->user->email,
            $event->order->total_price
        );

        Log::info($message, ['order_id' => $event->order->id]);
        $this->telegramNotifier->send($message);
    }
}
