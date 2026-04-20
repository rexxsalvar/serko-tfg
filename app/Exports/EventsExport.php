<?php

namespace App\Exports;

use App\Models\Event;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EventsExport implements FromQuery, WithHeadings, WithMapping
{
    public function query(): Builder
    {
        return Event::query()->with(['stadium', 'competition', 'homeTeam', 'awayTeam']);
    }

    public function headings(): array
    {
        return ['ID', 'Partido', 'Competicion', 'Estadio', 'Fecha'];
    }

    public function map($row): array
    {
        return [
            $row->id,
            "{$row->homeTeam?->name} vs {$row->awayTeam?->name}",
            $row->competition?->name,
            $row->stadium?->name,
            $row->date,
        ];
    }
}
