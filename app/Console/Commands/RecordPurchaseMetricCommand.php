<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class RecordPurchaseMetricCommand extends Command
{
    protected $signature = 'serko:record-purchase-metric {order : Paid order id}';

    protected $description = 'Record an operational metric after a ticket purchase.';

    public function handle(): int
    {
        $order = Order::query()
            ->withCount('tickets')
            ->findOrFail((int) $this->argument('order'));

        Log::info('SERKO purchase metric recorded.', [
            'order_id' => $order->id,
            'tickets_count' => $order->tickets_count,
            'total_price' => $order->total_price,
        ]);

        $this->info("Purchase metric recorded for order #{$order->id}.");

        return self::SUCCESS;
    }
}
