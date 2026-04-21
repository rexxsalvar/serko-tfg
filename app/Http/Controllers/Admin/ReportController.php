<?php

namespace App\Http\Controllers\Admin;

use App\Events\ReportExported;
use App\Exports\EventsExport;
use App\Exports\SalesExport;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ReportController extends Controller
{
    public function index(): View
    {
        return view('admin.reports.index', [
            'paidOrders' => Order::query()->where('status', 'paid')->count(),
            'revenue' => Order::query()->where('status', 'paid')->sum('total_price'),
            'events' => Event::query()->count(),
            'soldTickets' => Order::query()->where('status', 'paid')->withCount('tickets')->get()->sum('tickets_count'),
        ]);
    }

    public function sales(): BinaryFileResponse
    {
        event(new ReportExported('sales', 'serko-sales.xlsx'));

        return Excel::download(new SalesExport, 'serko-sales.xlsx');
    }

    public function events(): BinaryFileResponse
    {
        event(new ReportExported('events', 'serko-events.xlsx'));

        return Excel::download(new EventsExport, 'serko-events.xlsx');
    }
}
