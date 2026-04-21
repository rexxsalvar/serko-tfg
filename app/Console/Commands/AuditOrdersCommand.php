<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;

class AuditOrdersCommand extends Command
{
    protected $signature = 'serko:audit-orders';

    protected $description = 'Audit paid orders and report orders without payment or tickets.';

    public function handle(): int
    {
        $ordersWithoutPayment = Order::query()
            ->where('status', 'paid')
            ->doesntHave('payment')
            ->count();

        $ordersWithoutTickets = Order::query()
            ->where('status', 'paid')
            ->doesntHave('tickets')
            ->count();

        $this->info("Paid orders without payment: {$ordersWithoutPayment}");
        $this->info("Paid orders without tickets: {$ordersWithoutTickets}");

        return $ordersWithoutPayment === 0 && $ordersWithoutTickets === 0
            ? self::SUCCESS
            : self::FAILURE;
    }
}
