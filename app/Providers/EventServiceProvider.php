<?php

namespace App\Providers;

use App\Events\EventCreated;
use App\Events\TicketPurchased;
use App\Listeners\LogPurchase;
use App\Listeners\SendTicketEmail;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        EventCreated::class => [],
        TicketPurchased::class => [
            SendTicketEmail::class,
            LogPurchase::class,
        ],
    ];
}
