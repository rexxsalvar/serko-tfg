<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            CompetitionSeeder::class,
            TeamSeeder::class,
            StadiumSeeder::class,
            EventSeeder::class,
        ]);

        $admin = User::factory()->create([
            'name' => 'SERKO Admin',
            'email' => 'admin@serko.test',
        ]);
        $admin->assignRole('Admin');

        $user = User::factory()->create([
            'name' => 'SERKO User',
            'email' => 'user@serko.test',
        ]);
        $user->assignRole('User');
    }
}
