<?php

namespace App\Policies;

use App\Models\Payment;
use App\Models\User;

class PaymentPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Payment $payment): bool
    {
        return $user->isBackoffice() || $payment->order?->user_id === $user->id;
    }

    public function update(User $user, Payment $payment): bool
    {
        return $user->hasAnyRole(['Admin', 'Manager']);
    }
}
