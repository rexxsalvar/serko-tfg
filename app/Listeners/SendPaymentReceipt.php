<?php

namespace App\Listeners;

use App\Events\PaymentCaptured;
use App\Jobs\SendEmailJob;
use App\Mail\PaymentReceiptMail;

class SendPaymentReceipt
{
    public function handle(PaymentCaptured $event): void
    {
        $payment = $event->payment->load('order.user', 'order.tickets');

        SendEmailJob::dispatch(
            $payment->order->user->email,
            PaymentReceiptMail::class,
            ['payment' => $payment],
        );
    }
}
