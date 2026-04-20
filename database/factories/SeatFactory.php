<?php

namespace Database\Factories;

use App\Models\Seat;
use App\Models\Sector;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeatFactory extends Factory
{
    protected $model = Seat::class;

    public function definition(): array
    {
        return [
            'sector_id' => Sector::factory(),
            'row' => $this->faker->randomElement(range('A', 'Z')),
            'number' => $this->faker->numberBetween(1, 40),
        ];
    }
}
