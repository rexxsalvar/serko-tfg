<?php

namespace App\Jobs;

use App\Models\Order;
use App\Services\PdfGeneratorService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class GeneratePdfJob implements ShouldQueue
{
    use Queueable;

    public function __construct(
        private readonly int $orderId,
        private readonly string $type,
    ) {
    }

    public function handle(PdfGeneratorService $pdfGeneratorService): void
    {
        $order = Order::query()->with('tickets.event.homeTeam', 'tickets.event.awayTeam', 'tickets.seat', 'user')->findOrFail($this->orderId);

        $pdfGeneratorService->generateForOrder($order, $this->type);
    }
}
