<?php

namespace App\Http\Controllers\Admin;

use App\Exports\EventsExport;
use App\Exports\SalesExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ReportController extends Controller
{
    public function sales(): BinaryFileResponse
    {
        return Excel::download(new SalesExport(), 'serko-sales.xlsx');
    }

    public function events(): BinaryFileResponse
    {
        return Excel::download(new EventsExport(), 'serko-events.xlsx');
    }
}
