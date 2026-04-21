<?php

namespace Database\Seeders;

use App\Models\Seat;
use App\Models\Sector;
use App\Models\Stadium;
use Illuminate\Database\Seeder;

class StadiumSeeder extends Seeder
{
    public function run(): void
    {
        $stadiums = [
            ['name' => 'Santiago Bernabeu', 'city' => 'Madrid', 'capacity' => 81044, 'image' => 'https://placehold.co/1280x720/111827/fcbf49?text=Santiago+Bernabeu'],
            ['name' => 'Camp Nou', 'city' => 'Barcelona', 'capacity' => 99354, 'image' => 'https://placehold.co/1280x720/111827/d62828?text=Camp+Nou'],
            ['name' => 'Metropolitano', 'city' => 'Madrid', 'capacity' => 70460, 'image' => 'https://placehold.co/1280x720/111827/ffffff?text=Metropolitano'],
        ];

        foreach ($stadiums as $stadiumData) {
            $stadium = Stadium::query()->updateOrCreate(
                ['name' => $stadiumData['name']],
                $stadiumData,
            );

            foreach ([['name' => 'Fondo Norte', 'type' => 'general'], ['name' => 'Lateral Este', 'type' => 'family'], ['name' => 'Tribuna VIP', 'type' => 'vip']] as $sectorData) {
                $sector = Sector::query()->firstOrCreate(
                    ['stadium_id' => $stadium->id, 'name' => $sectorData['name']],
                    ['type' => $sectorData['type']],
                );

                foreach (range('A', 'C') as $row) {
                    foreach (range(1, 12) as $number) {
                        Seat::query()->firstOrCreate([
                            'sector_id' => $sector->id,
                            'row' => $row,
                            'number' => $number,
                        ]);
                    }
                }
            }
        }
    }
}
