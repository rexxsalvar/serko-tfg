<?php

use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\StadiumController as AdminStadiumController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StadiumController;
use App\Livewire\ManageCompetitions;
use App\Livewire\ManageEvents;
use App\Livewire\ManageOrders;
use App\Livewire\ManagePayments;
use App\Livewire\ManageSectors;
use App\Livewire\ManageStadiums;
use App\Livewire\ManageTeams;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::get('/dashboard', function () {
    $user = auth()->user();
    $tickets = $user?->tickets()->with(['event.homeTeam', 'event.awayTeam', 'seat'])->latest()->take(6)->get() ?? collect();
    $orders = $user?->orders()->with('payment')->withCount('tickets')->latest()->take(5)->get() ?? collect();
    $upcomingTickets = $user?->tickets()
        ->with(['event.homeTeam', 'event.awayTeam', 'seat'])
        ->whereHas('event', fn ($query) => $query->where('date', '>=', now()))
        ->get() ?? collect();
    $ticketTotal = $user?->tickets()->count() ?? 0;
    $orderTotal = $user?->orders()->count() ?? 0;
    $upcomingTotal = $upcomingTickets->count();

    return view('dashboard', compact('tickets', 'orders', 'upcomingTickets', 'ticketTotal', 'orderTotal', 'upcomingTotal'));
})->middleware('auth')->name('dashboard');

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::get('/stadiums', [StadiumController::class, 'index'])->name('stadiums.index');
Route::get('/stadiums/{stadium}', [StadiumController::class, 'show'])->name('stadiums.show');
Route::get('/locale/{locale}', [LocaleController::class, 'switch'])->name('locale.switch');

Route::middleware('guest')->group(function (): void {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function (): void {
    Route::get('/checkout/{event}', [OrderController::class, 'checkout'])->name('orders.checkout');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:Admin'])->group(function (): void {
    Route::view('/', 'admin.index')->name('index');
    Route::resource('events', AdminEventController::class);
    Route::resource('stadiums', AdminStadiumController::class);
    Route::post('/media', [MediaController::class, 'store'])->name('media.store');
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/sales', [ReportController::class, 'sales'])->name('reports.sales');
    Route::get('/reports/events', [ReportController::class, 'events'])->name('reports.events');
    Route::get('/livewire/events', ManageEvents::class)->name('livewire.events');
    Route::get('/livewire/stadiums', ManageStadiums::class)->name('livewire.stadiums');
    Route::get('/livewire/teams', ManageTeams::class)->name('livewire.teams');
    Route::get('/livewire/competitions', ManageCompetitions::class)->name('livewire.competitions');
    Route::get('/livewire/sectors', ManageSectors::class)->name('livewire.sectors');
    Route::get('/livewire/orders', ManageOrders::class)->name('livewire.orders');
    Route::get('/livewire/payments', ManagePayments::class)->name('livewire.payments');
});
