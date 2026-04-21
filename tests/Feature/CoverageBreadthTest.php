<?php

use App\Exports\EventsExport;
use App\Exports\SalesExport;
use App\Http\Resources\PaymentResource;
use App\Http\Resources\SectorResource;
use App\Livewire\ManageEvents;
use App\Livewire\ManageStadiums;
use App\Livewire\SeatSelector;
use App\Mail\EventReminderMail;
use App\Mail\PurchaseConfirmationMail;
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
use App\Services\TelegramNotifier;
use Database\Seeders\RoleSeeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Sanctum\Sanctum;
use Livewire\Livewire;

beforeEach(function (): void {
    $this->seed(RoleSeeder::class);
});

function serkoAdmin(): User
{
    $admin = User::factory()->create(['role' => 'Admin']);
    $admin->assignRole('Admin');

    return $admin;
}

function serkoEventFixture(): array
{
    $stadium = Stadium::factory()->create();
    $sector = Sector::factory()->for($stadium)->create(['type' => 'vip']);
    $seat = Seat::factory()->for($sector)->create(['row' => 'A', 'number' => 1]);
    $competition = Competition::factory()->create();
    $suffix = Str::upper(Str::random(6));
    $home = Team::factory()->create(['name' => "Home {$suffix} FC"]);
    $away = Team::factory()->create(['name' => "Away {$suffix} FC"]);
    $event = Event::factory()->create([
        'stadium_id' => $stadium->id,
        'competition_id' => $competition->id,
        'home_team_id' => $home->id,
        'away_team_id' => $away->id,
    ]);
    $event->seats()->attach($seat->id, ['price' => 99, 'status' => 'available']);

    return compact('stadium', 'sector', 'seat', 'competition', 'home', 'away', 'event');
}

it('renders public event and stadium pages with filtering', function (): void {
    $fixture = serkoEventFixture();

    $this->get('/events?search=Home')
        ->assertOk()
        ->assertSee('Home');

    $this->get(route('events.show', $fixture['event']))
        ->assertOk()
        ->assertSee('Away');

    $this->get('/stadiums')
        ->assertOk()
        ->assertSee($fixture['stadium']->name);

    $this->get(route('stadiums.show', $fixture['stadium']))
        ->assertOk()
        ->assertSee($fixture['sector']->name);
});

it('covers admin event management screens and mutations', function (): void {
    $admin = serkoAdmin();
    $fixture = serkoEventFixture();

    $this->actingAs($admin)->get(route('admin.events.index'))->assertOk();
    $this->actingAs($admin)->get(route('admin.events.create'))->assertOk();
    $this->actingAs($admin)->get(route('admin.events.show', $fixture['event']))->assertOk();
    $this->actingAs($admin)->get(route('admin.events.edit', $fixture['event']))->assertOk();

    $newHome = Team::factory()->create();
    $newAway = Team::factory()->create();

    $this->actingAs($admin)->post(route('admin.events.store'), [
        'stadium_id' => $fixture['stadium']->id,
        'competition_id' => $fixture['competition']->id,
        'home_team_id' => $newHome->id,
        'away_team_id' => $newAway->id,
        'date' => now()->addMonth()->format('Y-m-d H:i:s'),
        'description' => '<p>Admin fixture</p>',
        'seats' => [
            ['seat_id' => $fixture['seat']->id, 'price' => 120, 'status' => 'reserved'],
        ],
    ])->assertRedirect(route('admin.events.index'));

    $this->actingAs($admin)->put(route('admin.events.update', $fixture['event']), [
        'stadium_id' => $fixture['stadium']->id,
        'competition_id' => $fixture['competition']->id,
        'home_team_id' => $fixture['home']->id,
        'away_team_id' => $fixture['away']->id,
        'date' => now()->addWeeks(3)->format('Y-m-d H:i:s'),
        'description' => '<p>Updated</p>',
        'seats' => [
            ['seat_id' => $fixture['seat']->id, 'price' => 80, 'status' => 'available'],
        ],
    ])->assertRedirect(route('admin.events.index'));

    $this->actingAs($admin)->delete(route('admin.events.destroy', $fixture['event']))
        ->assertRedirect();

    $this->assertSoftDeleted('events', ['id' => $fixture['event']->id]);
});

it('covers admin stadium management, media upload and reports', function (): void {
    Storage::fake('public');
    $admin = serkoAdmin();
    $fixture = serkoEventFixture();

    $this->actingAs($admin)->get(route('admin.stadiums.index'))->assertOk();
    $this->actingAs($admin)->get(route('admin.stadiums.create'))->assertOk();
    $this->actingAs($admin)->get(route('admin.stadiums.show', $fixture['stadium']))->assertOk();
    $this->actingAs($admin)->get(route('admin.stadiums.edit', $fixture['stadium']))->assertOk();

    $this->actingAs($admin)->post(route('admin.stadiums.store'), [
        'name' => 'SERKO Arena',
        'city' => 'Valencia',
        'capacity' => 50000,
        'image' => 'uploads/arena.jpg',
    ])->assertRedirect(route('admin.stadiums.index'));

    $this->actingAs($admin)->put(route('admin.stadiums.update', $fixture['stadium']), [
        'name' => 'SERKO Updated',
        'city' => 'Madrid',
        'capacity' => 61000,
        'image' => 'uploads/updated.jpg',
    ])->assertRedirect(route('admin.stadiums.index'));

    $this->actingAs($admin)->postJson(route('admin.media.store'), [
        'file' => UploadedFile::fake()->image('stadium.jpg', 600, 400),
    ])->assertOk()->assertJsonStructure(['path']);

    $this->actingAs($admin)->get(route('admin.reports.index'))->assertOk();
    $this->actingAs($admin)->get(route('admin.reports.sales'))->assertOk();
    $this->actingAs($admin)->get(route('admin.reports.events'))->assertOk();

    $this->actingAs($admin)->delete(route('admin.stadiums.destroy', $fixture['stadium']))
        ->assertRedirect();

    $this->assertSoftDeleted('stadiums', ['id' => $fixture['stadium']->id]);
});

it('covers protected api stadium and event mutations', function (): void {
    $admin = serkoAdmin();
    Sanctum::actingAs($admin);
    $fixture = serkoEventFixture();

    $this->postJson('/api/stadiums', [
        'name' => 'API Arena',
        'city' => 'Sevilla',
        'capacity' => 42000,
    ])->assertCreated()->assertJsonPath('data.name', 'API Arena');

    $this->getJson('/api/stadiums/'.$fixture['stadium']->id)
        ->assertOk()
        ->assertJsonPath('data.id', $fixture['stadium']->id);

    $this->putJson('/api/stadiums/'.$fixture['stadium']->id, [
        'name' => 'API Updated',
        'city' => 'Bilbao',
        'capacity' => 43000,
    ])->assertOk()->assertJsonPath('data.name', 'API Updated');

    $this->putJson('/api/events/'.$fixture['event']->id, [
        'stadium_id' => $fixture['stadium']->id,
        'competition_id' => $fixture['competition']->id,
        'home_team_id' => $fixture['home']->id,
        'away_team_id' => $fixture['away']->id,
        'date' => now()->addWeeks(4)->toDateTimeString(),
        'description' => 'API event updated',
    ])->assertOk()->assertJsonPath('data.description', 'API event updated');

    $this->deleteJson('/api/events/'.$fixture['event']->id)->assertNoContent();
    $this->deleteJson('/api/stadiums/'.$fixture['stadium']->id)->assertNoContent();
});

it('covers auth edge cases and private order screens', function (): void {
    $user = User::factory()->create(['password' => 'password']);
    $fixture = serkoEventFixture();
    $order = Order::factory()->for($user)->create(['status' => 'paid']);
    Payment::factory()->for($order)->create();
    Ticket::factory()->for($order)->for($fixture['event'])->for($fixture['seat'])->create();

    $this->post('/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ])->assertSessionHasErrors('email');

    $this->actingAs($user)->get('/dashboard')->assertOk();
    $this->actingAs($user)->get(route('orders.index'))->assertOk();
    $this->actingAs($user)->get(route('orders.show', $order))->assertOk();
    $this->actingAs($user)->post(route('logout'))->assertRedirect(route('login'));

    Sanctum::actingAs($user);
    $this->deleteJson('/api/tokens/current')->assertNoContent();
});

it('covers livewire management components and seat selector interactions', function (): void {
    $fixture = serkoEventFixture();

    Livewire::test(ManageEvents::class)
        ->set('search', 'Home')
        ->assertSee('Home')
        ->call('delete', $fixture['event']->id);

    $this->assertSoftDeleted('events', ['id' => $fixture['event']->id]);

    $stadium = Stadium::factory()->create(['name' => 'Livewire Arena', 'city' => 'Malaga']);

    Livewire::test(ManageStadiums::class)
        ->set('search', 'Livewire')
        ->assertSee('Livewire Arena')
        ->call('delete', $stadium->id);

    $this->assertSoftDeleted('stadiums', ['id' => $stadium->id]);

    $selectorFixture = serkoEventFixture();

    Livewire::test(SeatSelector::class, ['event' => $selectorFixture['event']])
        ->call('toggle', $selectorFixture['seat']->id)
        ->assertSet('selected', [$selectorFixture['seat']->id])
        ->call('toggle', $selectorFixture['seat']->id)
        ->assertSet('selected', []);
});

it('covers exports, resources, mails, models and external service adapters', function (): void {
    Http::fake();

    $fixture = serkoEventFixture();
    $user = User::factory()->create();
    $order = Order::factory()->for($user)->create(['total_price' => 75, 'status' => 'paid']);
    $payment = Payment::factory()->for($order)->create(['transaction_id' => 'TX-1']);
    $ticket = Ticket::factory()->for($order)->for($fixture['event'])->for($fixture['seat'])->create();

    expect((new SalesExport)->headings())->toContain('Usuario')
        ->and((new SalesExport)->map($order))->toContain($user->email)
        ->and((new EventsExport)->headings())->toContain('Partido')
        ->and((new EventsExport)->map($fixture['event']))->toContain($fixture['home']->name.' vs '.$fixture['away']->name);

    expect((new PaymentResource($payment))->toArray(request()))->toMatchArray(['transaction_id' => 'TX-1'])
        ->and((new SectorResource($fixture['sector']->loadCount('seats')->load('seats')))->toArray(request()))->toHaveKey('seats');

    expect((new PurchaseConfirmationMail($order))->envelope()->subject)->toContain((string) $order->id)
        ->and((new PurchaseConfirmationMail($order))->content()->view)->toBe('emails.purchase-confirmation')
        ->and((new EventReminderMail($ticket))->content()->view)->toBe('emails.event-reminder');

    config([
        'services.telegram.bot_token' => 'token',
        'services.telegram.chat_id' => 'chat',
    ]);
    app(TelegramNotifier::class)->send('Coverage ping');
    Http::assertSent(fn ($request) => str_contains($request->url(), 'api.telegram.org'));

    $mockCapture = app(PayPalService::class)->capture('manual-cover');

    expect($mockCapture['status'])->toBe('COMPLETED')
        ->and($fixture['event']->stadium()->exists())->toBeTrue()
        ->and($fixture['event']->competition()->exists())->toBeTrue()
        ->and($fixture['event']->homeTeam()->exists())->toBeTrue()
        ->and($fixture['event']->awayTeam()->exists())->toBeTrue()
        ->and($fixture['event']->tickets()->count())->toBe(1)
        ->and($fixture['stadium']->sectors()->count())->toBe(1)
        ->and(Stadium::query()->upcomingEvents()->count())->toBeGreaterThanOrEqual(1)
        ->and($fixture['sector']->stadium()->is($fixture['stadium']))->toBeTrue()
        ->and($fixture['sector']->seats()->count())->toBe(1)
        ->and($payment->order()->is($order))->toBeTrue()
        ->and($order->user()->is($user))->toBeTrue()
        ->and($order->tickets()->count())->toBe(1)
        ->and($order->payment()->is($payment))->toBeTrue()
        ->and($fixture['home']->homeEvents()->count())->toBeGreaterThanOrEqual(1)
        ->and($fixture['away']->awayEvents()->count())->toBeGreaterThanOrEqual(1)
        ->and($fixture['competition']->events()->count())->toBeGreaterThanOrEqual(1)
        ->and($user->isAdmin())->toBeFalse();
});
