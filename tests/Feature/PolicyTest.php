<?php

use App\Models\Event;
use App\Models\Order;
use App\Models\Seat;
use App\Models\Ticket;
use App\Models\User;
use Database\Seeders\RoleSeeder;

beforeEach(function (): void {
    $this->seed(RoleSeeder::class);
});

it('allows admins to manage events', function (): void {
    $admin = User::factory()->create();
    $admin->assignRole('Admin');

    expect($admin->can('create', Event::class))->toBeTrue();
});

it('prevents regular users from viewing other users tickets', function (): void {
    $owner = User::factory()->create();
    $owner->assignRole('User');
    $intruder = User::factory()->create();
    $intruder->assignRole('User');

    $ticket = Ticket::factory()->for(Order::factory()->for($owner))->for(Event::factory())->for(Seat::factory())->create();

    expect($intruder->can('view', $ticket))->toBeFalse();
});
