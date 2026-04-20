<?php

use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\StadiumController;
use App\Http\Controllers\Api\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('events', [EventController::class, 'index']);
Route::get('events/{event}', [EventController::class, 'show']);
Route::get('stadiums', [StadiumController::class, 'index']);
Route::get('stadiums/{stadium}', [StadiumController::class, 'show']);

Route::middleware('auth:sanctum')->group(function (): void {
    Route::apiResource('events', EventController::class)->except(['index', 'show']);
    Route::apiResource('stadiums', StadiumController::class)->except(['index', 'show']);
    Route::apiResource('tickets', TicketController::class)->only(['index', 'show']);
});
