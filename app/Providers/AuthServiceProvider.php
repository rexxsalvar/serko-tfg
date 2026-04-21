<?php

namespace App\Providers;

use App\Models\Competition;
use App\Models\Event;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Sector;
use App\Models\Stadium;
use App\Models\Team;
use App\Models\Ticket;
use App\Policies\CompetitionPolicy;
use App\Policies\EventPolicy;
use App\Policies\OrderPolicy;
use App\Policies\PaymentPolicy;
use App\Policies\SectorPolicy;
use App\Policies\StadiumPolicy;
use App\Policies\TeamPolicy;
use App\Policies\TicketPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Competition::class => CompetitionPolicy::class,
        Event::class => EventPolicy::class,
        Order::class => OrderPolicy::class,
        Payment::class => PaymentPolicy::class,
        Sector::class => SectorPolicy::class,
        Stadium::class => StadiumPolicy::class,
        Team::class => TeamPolicy::class,
        Ticket::class => TicketPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
