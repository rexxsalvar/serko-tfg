<?php

use App\Models\Competition;
use App\Models\Event;
use App\Models\Seat;
use App\Models\Sector;
use App\Models\Stadium;
use App\Models\Team;
use App\Models\User;
use App\Services\PayPalService;
use Database\Seeders\RoleSeeder;
use Mockery\MockInterface;

beforeEach(function (): void {
    $this->seed(RoleSeeder::class);
});

it('purchases tickets and marks the selected seat as sold', function (): void {
    $user = User::factory()->create();
    $user->assignRole('User');

    $stadium = Stadium::factory()->create();
    $sector = Sector::factory()->for($stadium)->create();
    $seat = Seat::factory()->for($sector)->create();
    $event = Event::factory()->create([
        'stadium_id' => $stadium->id,
        'competition_id' => Competition::factory()->create()->id,
        'home_team_id' => Team::factory()->create()->id,
        'away_team_id' => Team::factory()->create()->id,
    ]);
    $event->seats()->attach($seat->id, ['price' => 55.50, 'status' => 'available']);

    $this->mock(PayPalService::class, function (MockInterface $mock): void {
        $mock->shouldReceive('capture')->andReturn(['status' => 'COMPLETED', 'id' => 'PAYPAL-123']);
    });

    $response = $this->actingAs($user)->post('/orders', [
        'event_id' => $event->id,
        'seat_ids' => [$seat->id],
        'payment_method' => 'paypal',
        'paypal_order_id' => 'PAYPAL-123',
    ]);

    $response->assertRedirect();

    $this->assertDatabaseHas('orders', ['user_id' => $user->id, 'status' => 'paid']);
    $this->assertDatabaseHas('tickets', ['event_id' => $event->id, 'seat_id' => $seat->id]);
    $this->assertDatabaseHas('payments', ['transaction_id' => 'PAYPAL-123']);
    $this->assertDatabaseHas('event_seat', ['event_id' => $event->id, 'seat_id' => $seat->id, 'status' => 'sold']);
});

it('prevents purchasing a sold seat', function (): void {
    $user = User::factory()->create();
    $user->assignRole('User');

    $stadium = Stadium::factory()->create();
    $sector = Sector::factory()->for($stadium)->create();
    $seat = Seat::factory()->for($sector)->create();
    $event = Event::factory()->create();
    $event->seats()->attach($seat->id, ['price' => 80, 'status' => 'sold']);

    $this->actingAs($user)->post('/orders', [
        'event_id' => $event->id,
        'seat_ids' => [$seat->id],
        'payment_method' => 'paypal',
        'paypal_order_id' => 'PAYPAL-123',
    ])->assertSessionHasErrors('seat_ids');
});
