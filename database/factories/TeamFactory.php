<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    protected $model = Team::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->company().' FC',
            'logo' => $this->faker->imageUrl(400, 400, 'sports'),
        ];
    }
}
