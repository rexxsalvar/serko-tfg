<?php

namespace App\Listeners;

use App\Events\TicketPurchased;
use App\Jobs\SendTelegramNotificationJob;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class LogPurchase
{
    public function handle(TicketPurchased $event): void
    {
        $message = sprintf(
            'Nueva compra SERKO: pedido #%d por %s (%s EUR).',
            $event->order->id,
            $event->order->user->email,
            $event->order->total_price
        );

        Log::info($message, ['order_id' => $event->order->id]);
        SendTelegramNotificationJob::dispatch($message);
        Artisan::call('serko:record-purchase-metric', ['order' => $event->order->id]);
    }
}
