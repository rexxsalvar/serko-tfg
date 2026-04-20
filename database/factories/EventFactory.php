<?php

namespace Database\Factories;

use App\Models\Competition;
use App\Models\Event;
use App\Models\Stadium;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition(): array
    {
        return [
            'stadium_id' => Stadium::factory(),
            'competition_id' => Competition::factory(),
            'home_team_id' => Team::factory(),
            'away_team_id' => Team::factory(),
            'date' => $this->faker->dateTimeBetween('+1 day', '+2 months'),
            'description' => $this->faker->paragraph(),
        ];
    }
}
