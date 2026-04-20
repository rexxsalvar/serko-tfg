<?php

return [
    'mode' => config('services.paypal.mode', 'sandbox'),
    'sandbox' => [
        'client_id' => env('PAYPAL_CLIENT_ID'),
        'client_secret' => env('PAYPAL_CLIENT_SECRET'),
        'app_id' => 'APP-80W284485P519543T',
    ],
    'live' => [
        'client_id' => env('PAYPAL_CLIENT_ID'),
        'client_secret' => env('PAYPAL_CLIENT_SECRET'),
        'app_id' => env('PAYPAL_APP_ID'),
    ],
    'payment_action' => 'Sale',
    'currency' => 'EUR',
    'notify_url' => '',
    'locale' => 'es_ES',
    'validate_ssl' => true,
];
