<?php

namespace App\Events;

use App\Models\Payment;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PaymentCaptured
{
    use Dispatchable, SerializesModels;

    public function __construct(public Payment $payment) {}
}
