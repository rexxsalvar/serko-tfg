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
        $stadiumImage = 'stadiums/football-stadium-4k-2v-1280x720.jpg';

        $stadiums = [
            ['name' => 'Santiago Bernabeu', 'city' => 'Madrid', 'capacity' => 81044, 'image' => $stadiumImage],
            ['name' => 'Camp Nou', 'city' => 'Barcelona', 'capacity' => 99354, 'image' => $stadiumImage],
            ['name' => 'Metropolitano', 'city' => 'Madrid', 'capacity' => 70460, 'image' => $stadiumImage],
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
