<?php

use App\Http\Controllers\Api\AuthTokenController;
use App\Http\Controllers\Api\CompetitionController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\SectorController;
use App\Http\Controllers\Api\StadiumController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\TicketController;
use Illuminate\Support\Facades\Route;

Route::post('tokens', [AuthTokenController::class, 'store']);

Route::get('events', [EventController::class, 'index']);
Route::get('events/{event}', [EventController::class, 'show']);
Route::get('stadiums', [StadiumController::class, 'index']);
Route::get('stadiums/{stadium}', [StadiumController::class, 'show']);
Route::get('teams', [TeamController::class, 'index']);
Route::get('teams/{team}', [TeamController::class, 'show']);
Route::get('competitions', [CompetitionController::class, 'index']);
Route::get('competitions/{competition}', [CompetitionController::class, 'show']);
Route::get('sectors', [SectorController::class, 'index']);
Route::get('sectors/{sector}', [SectorController::class, 'show']);

Route::middleware('auth:sanctum')->group(function (): void {
    Route::delete('tokens/current', [AuthTokenController::class, 'destroy']);
    Route::apiResource('events', EventController::class)->except(['index', 'show']);
    Route::apiResource('stadiums', StadiumController::class)->except(['index', 'show']);
    Route::apiResource('teams', TeamController::class)->except(['index', 'show']);
    Route::apiResource('competitions', CompetitionController::class)->except(['index', 'show']);
    Route::apiResource('sectors', SectorController::class)->except(['index', 'show']);
    Route::apiResource('orders', OrderController::class)->only(['index', 'show']);
    Route::apiResource('payments', PaymentController::class)->only(['index', 'show', 'update']);
    Route::apiResource('tickets', TicketController::class)->only(['index', 'show']);
});
