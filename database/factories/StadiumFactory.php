<?php

namespace Database\Factories;

use App\Models\Stadium;
use Illuminate\Database\Eloquent\Factories\Factory;

class StadiumFactory extends Factory
{
    protected $model = Stadium::class;

    public function definition(): array
    {
        return [
            'name' => 'Estadio '.$this->faker->unique()->citySuffix(),
            'city' => $this->faker->city(),
            'capacity' => $this->faker->numberBetween(15000, 90000),
            'image' => $this->faker->imageUrl(1280, 720, 'sports'),
        ];
    }
}
