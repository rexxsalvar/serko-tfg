<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;

class GenerateSalesSnapshotCommand extends Command
{
    protected $signature = 'serko:sales-snapshot';

    protected $description = 'Show a compact sales snapshot for the SERKO backoffice.';

    public function handle(): int
    {
        $paidOrders = Order::query()->paid()->count();
        $revenue = Order::query()->paid()->sum('total_price');

        $this->table(['Metric', 'Value'], [
            ['Paid orders', $paidOrders],
            ['Revenue', number_format((float) $revenue, 2).' EUR'],
        ]);

        return self::SUCCESS;
    }
}
