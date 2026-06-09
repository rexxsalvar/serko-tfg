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

        $admin = User::query()->updateOrCreate(['email' => 'admin@serko.test'], [
            'name' => 'SERKO Admin',
            'password' => 'password',
            'role' => 'Admin',
        ]);
        $admin->syncRoles(['Admin']);

        $user = User::query()->updateOrCreate(['email' => 'user@serko.test'], [
            'name' => 'SERKO User',
            'password' => 'password',
            'role' => 'User',
        ]);
        $user->syncRoles(['User']);

        foreach ([
            ['name' => 'SERKO Manager', 'email' => 'manager@serko.test', 'role' => 'Manager'],
            ['name' => 'SERKO Support', 'email' => 'support@serko.test', 'role' => 'Support'],
            ['name' => 'SERKO Auditor', 'email' => 'auditor@serko.test', 'role' => 'Auditor'],
            ['name' => 'SERKO Client', 'email' => 'client@serko.test', 'role' => 'User'],
        ] as $demoUser) {
            $account = User::query()->updateOrCreate(['email' => $demoUser['email']], [
                'name' => $demoUser['name'],
                'password' => 'password',
                'role' => $demoUser['role'],
            ]);
            $account->syncRoles([$demoUser['role']]);
        }

        $this->call(DemoSalesSeeder::class);
    }
}
