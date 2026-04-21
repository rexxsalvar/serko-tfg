<?php

namespace App\Services;

use Illuminate\Support\Str;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalService
{
    public function capture(string $paypalOrderId): array
    {
        if ($this->shouldUseMock($paypalOrderId)) {
            return [
                'id' => $paypalOrderId !== '' ? $paypalOrderId : 'SERKO-MOCK-'.Str::upper(Str::random(10)),
                'status' => 'COMPLETED',
                'mode' => 'mock',
            ];
        }

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        return $provider->capturePaymentOrder($paypalOrderId);
    }

    private function shouldUseMock(string $paypalOrderId): bool
    {
        return str_starts_with($paypalOrderId, 'manual-')
            || str_starts_with($paypalOrderId, 'mock-')
            || blank(config('services.paypal.client_id'))
            || blank(config('services.paypal.client_secret'))
            || filter_var(env('PAYPAL_MOCK', true), FILTER_VALIDATE_BOOLEAN);
    }
}
