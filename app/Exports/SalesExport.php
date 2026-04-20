<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SalesExport implements FromQuery, WithHeadings, WithMapping
{
    public function query(): Builder
    {
        return Order::query()->with('user');
    }

    public function headings(): array
    {
        return ['ID', 'Usuario', 'Estado', 'Total', 'Fecha'];
    }

    public function map($row): array
    {
        return [$row->id, $row->user?->email, $row->status, $row->total_price, $row->created_at];
    }
}
