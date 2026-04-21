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
            ['stadium' => 'Santiago Bernabeu', 'competition' => 'LaLiga', 'home' => 'Real Madrid', 'away' => 'FC Barcelona', 'days' => 12, 'hour' => 21],
            ['stadium' => 'Camp Nou', 'competition' => 'Champions League', 'home' => 'FC Barcelona', 'away' => 'Sevilla FC', 'days' => 19, 'hour' => 20],
            ['stadium' => 'Metropolitano', 'competition' => 'Copa del Rey', 'home' => 'Atletico de Madrid', 'away' => 'Real Betis', 'days' => 26, 'hour' => 22],
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
                    'date' => now()->addDays($eventData['days'])->setTime($eventData['hour'], 0),
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
