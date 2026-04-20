<?php

use App\Models\Competition;
use App\Models\Event;
use App\Models\Order;
use App\Models\Seat;
use App\Models\Stadium;
use App\Models\Team;
use App\Models\Ticket;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Laravel\Sanctum\Sanctum;

beforeEach(function (): void {
    $this->seed(RoleSeeder::class);
});

it('lists public events through the api', function (): void {
    Event::factory()->create();

    $this->getJson('/api/events')
        ->assertOk()
        ->assertJsonStructure(['data']);
});

it('allows an admin to create an event through the api', function (): void {
    $admin = User::factory()->create();
    $admin->assignRole('Admin');
    Sanctum::actingAs($admin);

    $stadium = Stadium::factory()->create();
    $competition = Competition::factory()->create();
    $home = Team::factory()->create();
    $away = Team::factory()->create();

    $this->postJson('/api/events', [
        'stadium_id' => $stadium->id,
        'competition_id' => $competition->id,
        'home_team_id' => $home->id,
        'away_team_id' => $away->id,
        'date' => now()->addWeek()->toDateTimeString(),
        'description' => '<p>Gran partido</p>',
    ])->assertCreated();
});

it('returns only the authenticated user tickets', function (): void {
    $user = User::factory()->create();
    $user->assignRole('User');
    $otherUser = User::factory()->create();
    $otherUser->assignRole('User');

    Sanctum::actingAs($user);

    $event = Event::factory()->create();
    $seat = Seat::factory()->create();
    $userOrder = Order::factory()->for($user)->create();
    $otherOrder = Order::factory()->for($otherUser)->create();

    Ticket::factory()->for($userOrder)->for($event)->for($seat)->create();
    Ticket::factory()->for($otherOrder)->for($event)->for($seat)->create();

    $this->getJson('/api/tickets')
        ->assertOk()
        ->assertJsonCount(1, 'data');
});
