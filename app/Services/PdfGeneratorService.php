<?php

namespace App\Services;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class PdfGeneratorService
{
    public function generateForOrder(Order $order, string $type): string
    {
        $view = match ($type) {
            'invoice' => 'pdfs.invoice',
            'receipt' => 'pdfs.receipt',
            'event-report' => 'pdfs.event-report',
            'sales-summary' => 'pdfs.sales-summary',
            default => 'pdfs.ticket',
        };
        $path = "pdf/{$type}-order-{$order->id}.pdf";

        Storage::disk('public')->put($path, Pdf::loadView($view, ['order' => $order])->output());

        return $path;
    }
}
