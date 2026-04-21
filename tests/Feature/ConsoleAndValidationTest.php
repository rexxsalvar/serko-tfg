<?php

use App\Models\Competition;
use App\Models\Event;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Seat;
use App\Models\Sector;
use App\Models\Stadium;
use App\Models\Team;
use App\Models\Ticket;
use App\Models\User;
use App\Services\PayPalService;
use Database\Seeders\RoleSeeder;
use Illuminate\Support\Facades\Artisan;
use Mockery\MockInterface;

beforeEach(function (): void {
    $this->seed(RoleSeeder::class);
});

function serkoConsoleFixture(string $seatStatus = 'available'): array
{
    $stadium = Stadium::factory()->create();
    $sector = Sector::factory()->for($stadium)->create();
    $seat = Seat::factory()->for($sector)->create();
    $event = Event::factory()->create([
        'stadium_id' => $stadium->id,
        'competition_id' => Competition::factory()->create()->id,
        'home_team_id' => Team::factory()->create()->id,
        'away_team_id' => Team::factory()->create()->id,
    ]);
    $event->seats()->attach($seat->id, ['price' => 55, 'status' => $seatStatus]);

    return compact('stadium', 'sector', 'seat', 'event');
}

it('registers and executes the three custom serko artisan commands', function (): void {
    $fixture = serkoConsoleFixture('reserved');

    $user = User::factory()->create();
    $order = Order::factory()->for($user)->create(['status' => 'paid']);
    Payment::factory()->for($order)->create();
    Ticket::factory()->for($order)->for($fixture['event'])->for($fixture['seat'])->create();

    $this->artisan('serko:audit-orders')
        ->expectsOutput('Paid orders without payment: 0')
        ->expectsOutput('Paid orders without tickets: 0')
        ->assertSuccessful();

    $this->artisan('serko:release-reserved-seats', ['--dry-run' => true])
        ->expectsOutput('Reserved seats ready to release: 1')
        ->assertSuccessful();

    $this->artisan('serko:release-reserved-seats')
        ->expectsOutput('Released reserved seats: 1')
        ->assertSuccessful();

    $this->assertDatabaseHas('event_seat', [
        'event_id' => $fixture['event']->id,
        'seat_id' => $fixture['seat']->id,
        'status' => 'available',
    ]);

    $this->artisan('serko:record-purchase-metric', ['order' => $order->id])
        ->expectsOutput("Purchase metric recorded for order #{$order->id}.")
        ->assertSuccessful();
});

it('calls the purchase metric command from application code after checkout', function (): void {
    $user = User::factory()->create();
    $fixture = serkoConsoleFixture();

    $this->mock(PayPalService::class, function (MockInterface $mock): void {
        $mock->shouldReceive('capture')->andReturn(['status' => 'COMPLETED', 'id' => 'PAYPAL-CODE-CALL']);
    });

    Artisan::partialMock()
        ->shouldReceive('call')
        ->once()
        ->with('serko:record-purchase-metric', Mockery::on(fn (array $arguments) => isset($arguments['order'])))
        ->andReturn(0);

    $this->actingAs($user)->post('/orders', [
        'event_id' => $fixture['event']->id,
        'seat_ids' => [$fixture['seat']->id],
        'payment_method' => 'paypal',
        'paypal_order_id' => 'PAYPAL-CODE-CALL',
    ])->assertRedirect();
});

it('uses the custom available seats validation rule during checkout', function (): void {
    $user = User::factory()->create();
    $fixture = serkoConsoleFixture('sold');

    $this->actingAs($user)->post('/orders', [
        'event_id' => $fixture['event']->id,
        'seat_ids' => [$fixture['seat']->id],
        'payment_method' => 'paypal',
        'paypal_order_id' => 'PAYPAL-SOLD-SEAT',
    ])->assertSessionHasErrors('seat_ids');
});
