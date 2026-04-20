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
        Stadium::factory(3)->create()->each(function (Stadium $stadium): void {
            Sector::factory(3)->for($stadium)->create()->each(function (Sector $sector): void {
                foreach (range('A', 'C') as $row) {
                    foreach (range(1, 12) as $number) {
                        Seat::query()->create([
                            'sector_id' => $sector->id,
                            'row' => $row,
                            'number' => $number,
                        ]);
                    }
                }
            });
        });
    }
}
