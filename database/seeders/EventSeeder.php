<?php

namespace Database\Seeders;

use App\Models\Competition;
use App\Models\Event;
use App\Models\Stadium;
use App\Models\Team;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $teams = Team::query()->get();
        $competitions = Competition::query()->get();

        Stadium::query()->with('sectors.seats')->get()->each(function (Stadium $stadium) use ($teams, $competitions): void {
            $homeTeam = $teams->random();
            $awayTeam = $teams->where('id', '!=', $homeTeam->id)->random();

            $event = Event::query()->create([
                'stadium_id' => $stadium->id,
                'competition_id' => $competitions->random()->id,
                'home_team_id' => $homeTeam->id,
                'away_team_id' => $awayTeam->id,
                'date' => now()->addDays(rand(2, 30)),
                'description' => 'Partido destacado de la jornada.',
            ]);

            $stadium->sectors->flatMap->seats->each(function ($seat) use ($event): void {
                $event->seats()->attach($seat->id, [
                    'price' => fake()->randomFloat(2, 30, 220),
                    'status' => 'available',
                ]);
            });
        });
    }
}
