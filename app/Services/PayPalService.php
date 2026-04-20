<?php

namespace App\Services;

use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalService
{
    public function capture(string $paypalOrderId): array
    {
        $provider = new PayPalClient();
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        return $provider->capturePaymentOrder($paypalOrderId);
    }
}
