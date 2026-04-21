<?php

use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Support\Facades\Hash;

beforeEach(function (): void {
    $this->seed(RoleSeeder::class);
});

it('registers a new user and assigns the user role', function (): void {
    $response = $this->post('/register', [
        'name' => 'Nuevo Usuario',
        'email' => 'nuevo@serko.test',
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ]);

    $response->assertRedirect('/dashboard');

    $user = User::query()->where('email', 'nuevo@serko.test')->first();

    expect($user)->not->toBeNull()
        ->and($user->role)->toBe('User')
        ->and($user->hasRole('User'))->toBeTrue();
});

it('logs in an existing user', function (): void {
    $user = User::factory()->create([
        'email' => 'login@serko.test',
        'password' => Hash::make('password123'),
    ]);
    $user->assignRole('User');

    $response = $this->post('/login', [
        'email' => 'login@serko.test',
        'password' => 'password123',
    ]);

    $response->assertRedirect('/dashboard');
    $this->assertAuthenticatedAs($user);
});
