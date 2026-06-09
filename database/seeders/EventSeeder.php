<?php

namespace Database\Seeders;

use App\Models\Competition;
use App\Models\Event;
use App\Models\EventSeat;
use App\Models\Stadium;
use App\Models\Team;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            ['stadium' => 'Santiago Bernabeu', 'competition' => 'LaLiga', 'home' => 'Real Madrid', 'away' => 'FC Barcelona', 'date' => now()->addHours(18)],
            ['stadium' => 'Camp Nou', 'competition' => 'Champions League', 'home' => 'FC Barcelona', 'away' => 'Valencia CF', 'date' => now()->addDays(3)->setTime(21, 0)],
            ['stadium' => 'Metropolitano', 'competition' => 'Europa League', 'home' => 'Atletico de Madrid', 'away' => 'Real Betis', 'date' => now()->addDays(8)->setTime(20, 30)],
            ['stadium' => 'Metropolitano', 'competition' => 'Copa del Rey', 'home' => 'Sevilla FC', 'away' => 'Real Madrid', 'date' => now()->addDays(15)->setTime(19, 45)],
            ['stadium' => 'Camp Nou', 'competition' => 'LaLiga', 'home' => 'Valencia CF', 'away' => 'Atletico de Madrid', 'date' => now()->addDays(28)->setTime(22, 0)],
            ['stadium' => 'Santiago Bernabeu', 'competition' => 'Copa del Rey', 'home' => 'Real Betis', 'away' => 'FC Barcelona', 'date' => now()->addDays(45)->setTime(18, 15)],
            ['stadium' => 'Santiago Bernabeu', 'competition' => 'Champions League', 'home' => 'Real Madrid', 'away' => 'Sevilla FC', 'date' => now()->addDays(60)->setTime(21, 0)],
            ['stadium' => 'Camp Nou', 'competition' => 'LaLiga', 'home' => 'FC Barcelona', 'away' => 'Atletico de Madrid', 'date' => now()->addDays(90)->setTime(20, 0)],
        ];

        foreach ($events as $eventData) {
            $stadium = Stadium::query()->where('name', $eventData['stadium'])->firstOrFail();
            $competition = Competition::query()->where('name', $eventData['competition'])->firstOrFail();
            $homeTeam = Team::query()->where('name', $eventData['home'])->firstOrFail();
            $awayTeam = Team::query()->where('name', $eventData['away'])->firstOrFail();

            $event = Event::query()->updateOrCreate(
                [
                    'stadium_id' => $stadium->id,
                    'home_team_id' => $homeTeam->id,
                    'away_team_id' => $awayTeam->id,
                ],
                [
                    'competition_id' => $competition->id,
                    'date' => $eventData['date'],
                    'description' => '<p>Partido destacado de la jornada con experiencia SERKO, asientos verificados y entrada QR inmediata.</p>',
                ],
            );

            $stadium->loadMissing('sectors.seats');

            foreach ($stadium->sectors->flatMap->seats as $seat) {
                EventSeat::query()->firstOrCreate(
                    ['event_id' => $event->id, 'seat_id' => $seat->id],
                    [
                        'price' => $seat->sector->type === 'vip' ? 145 : ($seat->sector->type === 'family' ? 65 : 45),
                        'status' => 'available',
                    ],
                );
            }
        }
    }
}
