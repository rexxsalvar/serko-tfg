<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Admin', 'User', 'Manager', 'Support', 'Auditor'] as $role) {
            Role::findOrCreate($role);
        }
    }
}
