<?php

namespace Database\Factories;

use App\Models\Competition;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompetitionFactory extends Factory
{
    protected $model = Competition::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement(['LaLiga', 'Champions League', 'Copa del Rey', 'Europa League']),
        ];
    }
}
