<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        $teams = [
            'Real Madrid' => 'https://upload.wikimedia.org/wikipedia/en/5/56/Real_Madrid_CF.svg',
            'FC Barcelona' => 'https://upload.wikimedia.org/wikipedia/en/4/47/FC_Barcelona_%28crest%29.svg',
            'Atletico de Madrid' => 'https://upload.wikimedia.org/wikipedia/en/f/f4/Atletico_Madrid_2017_logo.svg',
            'Sevilla FC' => 'https://upload.wikimedia.org/wikipedia/en/3/3b/Sevilla_FC_logo.svg',
            'Valencia CF' => 'https://upload.wikimedia.org/wikipedia/en/c/ce/Valenciacf.svg',
            'Real Betis' => 'https://upload.wikimedia.org/wikipedia/en/1/13/Real_betis_logo.svg',
        ];

        foreach ($teams as $name => $logo) {
            Team::query()->firstOrCreate(
                ['name' => $name],
                ['logo' => $logo]
            );
        }
    }
}
