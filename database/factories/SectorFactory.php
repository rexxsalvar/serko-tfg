<?php

namespace Database\Factories;

use App\Models\Sector;
use App\Models\Stadium;
use Illuminate\Database\Eloquent\Factories\Factory;

class SectorFactory extends Factory
{
    protected $model = Sector::class;

    public function definition(): array
    {
        return [
            'stadium_id' => Stadium::factory(),
            'name' => 'Sector '.$this->faker->randomLetter().$this->faker->numberBetween(1, 9),
            'type' => $this->faker->randomElement(['general', 'vip', 'family']),
        ];
    }
}
