<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Real Madrid', 'FC Barcelona', 'Atletico de Madrid', 'Sevilla FC', 'Valencia CF', 'Real Betis'] as $name) {
            Team::query()->firstOrCreate(
                ['name' => $name],
                ['logo' => 'https://placehold.co/400x400?text='.urlencode($name)]
            );
        }
    }
}
