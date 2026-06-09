<?php

use App\Console\Commands\HealthCheckCommand;
use App\Events\EventCreated;
use App\Events\PaymentCaptured;
use App\Events\ReportExported;
use App\Events\SeatReserved;
use App\Jobs\ExportReportJob;
use App\Jobs\SendEmailJob;
use App\Jobs\SendEventReminderJob;
use App\Jobs\SendTelegramNotificationJob;
use App\Listeners\LogEventCreated;
use App\Listeners\LogReportExported;
use App\Listeners\LogSeatReserved;
use App\Listeners\SendPaymentReceipt;
use App\Livewire\ManageCompetitions;
use App\Livewire\ManageOrders;
use App\Livewire\ManagePayments;
use App\Livewire\ManageSectors;
use App\Livewire\ManageTeams;
use App\Mail\AdminReportMail;
use App\Mail\EventReminderMail;
use App\Mail\PaymentReceiptMail;
use App\Mail\SeatReservationMail;
use App\Models\Competition;
use App\Models\Event as MatchEvent;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Seat;
use App\Models\Sector;
use App\Models\Stadium;
use App\Models\Team;
use App\Models\Ticket;
use App\Models\User;
use App\Services\PdfGeneratorService;
use App\Services\TelegramNotifier;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\RoleSeeder;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Event as EventFacade;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Sanctum\Sanctum;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;

beforeEach(function (): void {
    $this->seed(RoleSeeder::class);
});

function serkoExpandedUser(string $role = 'User'): User
{
    $user = User::factory()->create(['role' => $role]);
    $user->assignRole($role);

    return $user;
}

function serkoExpandedFixture(string $seatStatus = 'available', int $soldSeats = 0): array
{
    $suffix = Str::upper(Str::random(8));
    $stadium = Stadium::query()->create([
        'name' => "SERKO Arena {$suffix}",
        'city' => 'Madrid',
        'capacity' => 75000,
        'image' => null,
    ]);
    $sector = Sector::query()->create([
        'stadium_id' => $stadium->id,
        'name' => "Sector {$suffix}",
        'type' => 'vip',
    ]);
    $seat = Seat::query()->create([
        'sector_id' => $sector->id,
        'row' => 'A',
        'number' => 1,
    ]);
    $competition = Competition::query()->create(['name' => "Liga {$suffix}"]);
    $home = Team::query()->create(['name' => "Home {$suffix}", 'logo' => null]);
    $away = Team::query()->create(['name' => "Away {$suffix}", 'logo' => null]);
    $event = MatchEvent::query()->create([
        'stadium_id' => $stadium->id,
        'competition_id' => $competition->id,
        'home_team_id' => $home->id,
        'away_team_id' => $away->id,
        'date' => now()->addDays(10),
        'description' => '<p>Fixture x2.5</p>',
    ]);

    $event->seats()->attach($seat->id, ['price' => 85, 'status' => $seatStatus]);

    if ($soldSeats > 0) {
        foreach (range(1, $soldSeats) as $number) {
            $soldSeat = Seat::query()->create([
                'sector_id' => $sector->id,
                'row' => 'B',
                'number' => $number,
            ]);
            $event->seats()->attach($soldSeat->id, ['price' => 95, 'status' => 'sold']);
        }
    }

    return compact('stadium', 'sector', 'seat', 'competition', 'home', 'away', 'event');
}

function serkoExpandedPaidOrder(User $user, array $fixture): array
{
    $order = Order::factory()->for($user)->create([
        'status' => 'paid',
        'total_price' => 85,
    ]);
    $payment = Payment::factory()->for($order)->create([
        'status' => 'completed',
        'transaction_id' => 'TX-'.Str::upper(Str::random(8)),
    ]);
    $ticket = Ticket::factory()
        ->for($order)
        ->for($fixture['event'])
        ->for($fixture['seat'])
        ->create(['price' => 85]);

    return compact('order', 'payment', 'ticket');
}

it('seeds the multiplied demo roles and users', function (): void {
    $this->seed(DatabaseSeeder::class);

    expect(Role::query()->pluck('name')->all())->toEqualCanonicalizing([
        'Admin',
        'Auditor',
        'Manager',
        'Support',
        'User',
    ]);

    foreach (['admin', 'user', 'manager', 'support', 'auditor'] as $account) {
        $this->assertDatabaseHas('users', ['email' => "{$account}@serko.test"]);
    }
});

it('exposes the expanded api models and protects private resources', function (): void {
    $admin = serkoExpandedUser('Admin');
    $manager = serkoExpandedUser('Manager');
    $user = serkoExpandedUser();
    $otherUser = serkoExpandedUser();
    $fixture = serkoExpandedFixture();
    $owned = serkoExpandedPaidOrder($user, $fixture);
    $other = serkoExpandedPaidOrder($otherUser, serkoExpandedFixture());

    Sanctum::actingAs($admin);

    $teamId = $this->postJson('/api/teams', ['name' => 'SERKO API FC'])
        ->assertCreated()
        ->assertJsonPath('data.name', 'SERKO API FC')
        ->json('data.id');
    $this->getJson("/api/teams/{$teamId}")->assertOk();
    $this->putJson("/api/teams/{$teamId}", ['name' => 'SERKO API United'])->assertOk();

    $competitionId = $this->postJson('/api/competitions', ['name' => 'SERKO API Cup'])
        ->assertCreated()
        ->json('data.id');
    $this->getJson("/api/competitions/{$competitionId}")->assertOk();
    $this->putJson("/api/competitions/{$competitionId}", ['name' => 'SERKO API Supercup'])->assertOk();

    $sectorId = $this->postJson('/api/sectors', [
        'stadium_id' => $fixture['stadium']->id,
        'name' => 'API North',
        'type' => 'family',
    ])->assertCreated()->json('data.id');
    $this->getJson("/api/sectors/{$sectorId}")->assertOk();
    $this->putJson("/api/sectors/{$sectorId}", [
        'stadium_id' => $fixture['stadium']->id,
        'name' => 'API North Updated',
        'type' => 'general',
    ])->assertOk();

    $this->deleteJson("/api/sectors/{$sectorId}")->assertNoContent();
    $this->deleteJson("/api/competitions/{$competitionId}")->assertNoContent();
    $this->deleteJson("/api/teams/{$teamId}")->assertNoContent();

    Sanctum::actingAs($user);
    $this->getJson('/api/orders')->assertOk()->assertJsonCount(1, 'data');
    $this->getJson('/api/payments')->assertOk()->assertJsonCount(1, 'data');
    $this->getJson('/api/orders/'.$owned['order']->id)->assertOk();
    $this->getJson('/api/orders/'.$other['order']->id)->assertForbidden();
    $this->getJson('/api/payments/'.$owned['payment']->id)->assertOk();
    $this->getJson('/api/payments/'.$other['payment']->id)->assertForbidden();

    Sanctum::actingAs($manager);
    $this->putJson('/api/payments/'.$owned['payment']->id, [
        'status' => 'refunded',
        'transaction_id' => 'TX-REFUND',
    ])->assertOk()->assertJsonPath('data.status', 'refunded');
});

it('executes the multiplied artisan command set and queues command-driven jobs', function (): void {
    Bus::fake();

    $fixture = serkoExpandedFixture('reserved');
    $user = serkoExpandedUser();
    serkoExpandedPaidOrder($user, $fixture);

    $this->artisan('serko:sync-event-availability')
        ->expectsOutput("Event #{$fixture['event']->id}: 0 available seats.")
        ->expectsOutput('Synchronized 1 events.')
        ->assertSuccessful();

    $this->artisan('serko:send-event-reminders', ['--hours' => 240])
        ->expectsOutput('Queued 1 reminder emails.')
        ->assertSuccessful();

    $this->artisan('serko:sales-snapshot')->assertSuccessful();

    $this->artisan('serko:export-operations-report', ['type' => 'sales'])
        ->expectsOutput('Queued sales operations report.')
        ->assertSuccessful();

    $this->artisan('serko:export-operations-report', ['type' => 'invalid'])
        ->expectsOutput('Invalid report type.')
        ->assertFailed();

    $this->artisan('serko:health-check')->assertExitCode(HealthCheckCommand::SUCCESS);

    Bus::assertDispatched(SendEventReminderJob::class);
    Bus::assertDispatched(ExportReportJob::class);
});

it('runs the extra jobs listeners mails and pdf branches', function (): void {
    $admin = serkoExpandedUser('Admin');
    $auditor = serkoExpandedUser('Auditor');
    $user = serkoExpandedUser();
    $fixture = serkoExpandedFixture();
    $purchase = serkoExpandedPaidOrder($user, $fixture);

    Mail::fake();
    (new SendEventReminderJob($purchase['ticket']->id))->handle();
    Mail::assertSent(EventReminderMail::class);

    Http::fake();
    config([
        'services.telegram.bot_token' => 'token',
        'services.telegram.chat_id' => 'chat',
    ]);
    (new SendTelegramNotificationJob('SERKO x2.5'))->handle(app(TelegramNotifier::class));
    Http::assertSent(fn ($request) => str_contains($request->url(), 'api.telegram.org'));

    Storage::fake('local');
    EventFacade::fake([ReportExported::class]);
    (new ExportReportJob('events'))->handle();
    Storage::disk('local')->assertExists('reports/events-queued-report.txt');
    EventFacade::assertDispatched(ReportExported::class);

    Bus::fake();
    (new SendPaymentReceipt)->handle(new PaymentCaptured($purchase['payment']));
    (new LogSeatReserved)->handle(new SeatReserved($fixture['event'], $fixture['seat']));
    (new LogReportExported)->handle(new ReportExported('sales', 'serko-sales.xlsx'));
    (new LogEventCreated)->handle(new EventCreated($fixture['event']));
    Bus::assertDispatchedTimes(SendEmailJob::class, 3);

    expect((new PaymentReceiptMail($purchase['payment']))->content()->view)->toBe('emails.payment-receipt')
        ->and((new AdminReportMail('sales', 'serko-sales.xlsx'))->content()->view)->toBe('emails.admin-report')
        ->and((new SeatReservationMail($fixture['event'], $fixture['seat']))->content()->view)->toBe('emails.seat-reservation')
        ->and($admin->isBackoffice())->toBeTrue()
        ->and($auditor->isBackoffice())->toBeTrue();

    Storage::fake('public');
    $order = $purchase['order']->load(['payment', 'tickets.event.homeTeam', 'tickets.event.awayTeam', 'tickets.seat', 'user']);
    $pdfs = app(PdfGeneratorService::class);

    foreach (['receipt', 'event-report', 'sales-summary', 'ticket'] as $type) {
        Storage::disk('public')->assertExists($pdfs->generateForOrder($order, $type));
    }
});

it('covers the additional livewire crud screens', function (): void {
    $fixture = serkoExpandedFixture();

    Livewire::test(ManageTeams::class)
        ->set('name', 'Livewire FC')
        ->set('logo', 'logos/livewire.svg')
        ->call('save')
        ->assertHasNoErrors();

    $team = Team::query()->where('name', 'Livewire FC')->firstOrFail();
    Livewire::test(ManageTeams::class)
        ->call('edit', $team->id)
        ->set('name', 'Livewire United')
        ->call('save')
        ->call('delete', $team->fresh()->id);
    $this->assertDatabaseMissing('teams', ['name' => 'Livewire United']);

    Livewire::test(ManageCompetitions::class)
        ->set('name', 'Livewire Cup')
        ->call('save')
        ->assertHasNoErrors();
    $competition = Competition::query()->where('name', 'Livewire Cup')->firstOrFail();
    Livewire::test(ManageCompetitions::class)
        ->call('edit', $competition->id)
        ->set('name', 'Livewire Supercup')
        ->call('save')
        ->call('delete', $competition->fresh()->id);
    $this->assertDatabaseMissing('competitions', ['name' => 'Livewire Supercup']);

    Livewire::test(ManageSectors::class)
        ->set('stadium_id', $fixture['stadium']->id)
        ->set('name', 'Livewire Stand')
        ->set('type', 'family')
        ->call('save')
        ->assertHasNoErrors();
    $sector = Sector::query()->where('name', 'Livewire Stand')->firstOrFail();
    Livewire::test(ManageSectors::class)
        ->call('edit', $sector->id)
        ->set('name', 'Livewire Stand Plus')
        ->call('save')
        ->call('delete', $sector->fresh()->id);
    $this->assertDatabaseMissing('sectors', ['name' => 'Livewire Stand Plus']);

    $user = serkoExpandedUser();
    $order = Order::factory()->for($user)->create(['status' => 'pending']);
    Livewire::test(ManageOrders::class)
        ->call('markPaid', $order->id)
        ->call('cancel', $order->id);
    expect($order->fresh()->status)->toBe('cancelled');

    $payment = Payment::factory()->for($order)->create(['status' => 'pending']);
    Livewire::test(ManagePayments::class)
        ->call('complete', $payment->id)
        ->call('fail', $payment->id);
    expect($payment->fresh()->status)->toBe('failed');

    Livewire::test(ManagePayments::class)->call('delete', $payment->id);
    Livewire::test(ManageOrders::class)->call('delete', $order->id);
    $this->assertDatabaseMissing('payments', ['id' => $payment->id]);
    $this->assertDatabaseMissing('orders', ['id' => $order->id]);
});

it('covers multiplied scopes policies and dynamic languages', function (): void {
    $admin = serkoExpandedUser('Admin');
    $manager = serkoExpandedUser('Manager');
    $support = serkoExpandedUser('Support');
    $user = serkoExpandedUser();
    $fixture = serkoExpandedFixture('available', soldSeats: 2);
    $purchase = serkoExpandedPaidOrder($user, $fixture);

    Stadium::query()->create([
        'name' => 'Tiny Ground',
        'city' => 'Alicante',
        'capacity' => 9000,
    ]);
    Payment::factory()->for($purchase['order'])->create([
        'status' => 'failed',
        'transaction_id' => 'TX-FAILED',
    ]);

    expect(MatchEvent::query()->betweenDates(now(), now()->addMonth())->count())->toBe(1)
        ->and(MatchEvent::query()->highDemand(2)->first()->id)->toBe($fixture['event']->id)
        ->and(Seat::query()->availableSeats($fixture['event'])->count())->toBe(1)
        ->and(Order::query()->paid()->forUser($user)->count())->toBe(1)
        ->and(Order::query()->withTicketTotals()->find($purchase['order']->id)->tickets_count)->toBe(1)
        ->and(Payment::query()->completed()->count())->toBe(1)
        ->and(Stadium::query()->largeCapacity()->first()->id)->toBe($fixture['stadium']->id)
        ->and(Team::query()->searchName('Home')->count())->toBe(1)
        ->and($manager->can('create', Team::class))->toBeTrue()
        ->and($manager->can('create', Competition::class))->toBeTrue()
        ->and($support->can('create', Sector::class))->toBeTrue()
        ->and($admin->can('update', $purchase['payment']))->toBeTrue()
        ->and($user->can('update', $purchase['payment']))->toBeFalse();

    foreach ([
        'es' => 'Compra entradas de futbol',
        'en' => 'Buy football tickets',
    ] as $locale => $copy) {
        $this->from('/')->get("/locale/{$locale}")->assertRedirect('/');
        $this->get('/')->assertOk()->assertSee($copy);
    }
});
