@extends('layouts.app')

@section('content')
    @php
        $paidOrders = \App\Models\Order::query()->paid()->count();
        $revenue = \App\Models\Order::query()->paid()->sum('total_price');
        $events = \App\Models\Event::query()->upcomingEvents()->count();
        $stadiums = \App\Models\Stadium::query()->count();
        $tickets = \App\Models\Ticket::query()->count();
        $availableSeats = \App\Models\EventSeat::query()->where('status', 'available')->count();
        $modules = [
            ['label' => __('serko.nav.events'), 'description' => __('serko.admin.events_subtitle'), 'route' => route('admin.events.index'), 'accent' => 'from-red-600 to-red-900'],
            ['label' => __('serko.nav.stadiums'), 'description' => __('serko.admin.stadiums_subtitle'), 'route' => route('admin.stadiums.index'), 'accent' => 'from-amber-400 to-red-700'],
            ['label' => __('serko.nav.teams'), 'description' => 'Gestion Livewire de equipos y logos.', 'route' => route('admin.livewire.teams'), 'accent' => 'from-blue-500 to-red-700'],
            ['label' => __('serko.nav.competitions'), 'description' => 'Alta, edicion y limpieza de competiciones.', 'route' => route('admin.livewire.competitions'), 'accent' => 'from-emerald-400 to-red-700'],
            ['label' => __('serko.nav.sectors'), 'description' => 'Sectores, tipos y estructura de aforo.', 'route' => route('admin.livewire.sectors'), 'accent' => 'from-green-500 to-slate-900'],
            ['label' => __('serko.nav.orders'), 'description' => 'Estado de pedidos, cancelaciones y pagos.', 'route' => route('admin.livewire.orders'), 'accent' => 'from-slate-500 to-red-800'],
            ['label' => __('serko.nav.payments'), 'description' => 'Control operativo de pagos PayPal.', 'route' => route('admin.livewire.payments'), 'accent' => 'from-yellow-400 to-slate-900'],
            ['label' => __('serko.nav.reports'), 'description' => __('serko.admin.exports_subtitle'), 'route' => route('admin.reports.index'), 'accent' => 'from-red-600 to-amber-400'],
        ];
    @endphp

    <section class="space-y-8">
        <div class="serko-card reveal-element overflow-hidden">
            <div class="grid gap-0 lg:grid-cols-[1.1fr_0.9fr]">
                <div class="p-8 md:p-10">
                    <p class="serko-kicker">{{ __('serko.admin.hub_kicker') }}</p>
                    <h1 class="font-display mt-3 text-4xl font-black text-white md:text-6xl">{{ __('serko.admin.hub_title') }}</h1>
                    <p class="mt-4 max-w-2xl text-gray-400">{{ __('serko.admin.hub_subtitle') }}</p>
                </div>
                <div class="bg-[radial-gradient(circle_at_top,#fcbf49_0%,#d62828_45%,#6a040f_100%)] p-8 text-white">
                    <p class="text-sm uppercase tracking-[0.3em] text-white/70">SERKO x2.5</p>
                    <p class="font-display mt-5 text-5xl font-black">{{ $tickets }}</p>
                    <p class="mt-2 text-white/70">{{ __('serko.nav.tickets') }} emitidos con QR</p>
                </div>
            </div>
        </div>

        <div class="grid gap-4 md:grid-cols-3 xl:grid-cols-6">
            <x-stat-card :label="__('serko.admin.paid_orders')" :value="$paidOrders" />
            <x-stat-card :label="__('serko.admin.revenue')" :value="number_format($revenue, 2).' EUR'" />
            <x-stat-card :label="__('serko.admin.events_metric')" :value="$events" />
            <x-stat-card :label="__('serko.nav.stadiums')" :value="$stadiums" />
            <x-stat-card :label="__('serko.nav.tickets')" :value="$tickets" />
            <x-stat-card :label="__('serko.events.available')" :value="$availableSeats" />
        </div>

        <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-4">
            @foreach ($modules as $module)
                <a href="{{ $module['route'] }}" class="serko-glow-card reveal-element group p-6">
                    <div class="h-2 rounded-full bg-gradient-to-r {{ $module['accent'] }}"></div>
                    <h2 class="font-display mt-6 text-2xl font-black text-white">{{ $module['label'] }}</h2>
                    <p class="mt-3 min-h-12 text-sm leading-6 text-gray-400">{{ $module['description'] }}</p>
                    <span class="mt-6 inline-flex text-sm font-black text-[#fcbf49] group-hover:text-white">Abrir modulo →</span>
                </a>
            @endforeach
        </div>
    </section>
@endsection
