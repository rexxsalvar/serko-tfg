<?php

namespace App\Policies;

use App\Models\Stadium;
use App\Models\User;

class StadiumPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Stadium $stadium): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    public function update(User $user, Stadium $stadium): bool
    {
        return $user->isAdmin();
    }

    public function delete(User $user, Stadium $stadium): bool
    {
        return $user->isAdmin();
    }
}
