@extends('layouts.app')

@section('content')
    @php
        $image = $event->stadium->image;
        $imageUrl = $image ? (filter_var($image, FILTER_VALIDATE_URL) ? $image : asset('storage/'.$image)) : 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?q=80&w=2069&auto=format&fit=crop';
        $availableSeats = $event->seats->where('pivot.status', 'available')->count();
        $lowestPrice = $event->seats->where('pivot.status', 'available')->min('pivot.price');
    @endphp

    <section class="-mx-4 -mt-8 md:-mx-8">
        <div class="relative min-h-[31rem] overflow-hidden">
            <img src="{{ $imageUrl }}" alt="{{ $event->stadium->name }}" class="absolute inset-0 h-full w-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-[#0b0f19] via-[#0b0f19]/60 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-[#0b0f19] via-[#0b0f19]/75 to-transparent"></div>
            <div class="relative mx-auto flex min-h-[31rem] max-w-7xl flex-col justify-end px-4 pb-12 md:px-8">
                <p class="serko-kicker reveal-element active">{{ $event->competition->name }}</p>
                <div class="mt-4 flex flex-col gap-8 lg:flex-row lg:items-end lg:justify-between">
                    <div class="reveal-element active">
                        <h1 class="font-display max-w-5xl text-5xl font-black leading-tight text-white md:text-7xl">
                            {{ $event->homeTeam->name }}
                            <span class="text-red-500">vs</span>
                            {{ $event->awayTeam->name }}
                        </h1>
                        <p class="mt-5 flex flex-wrap gap-4 text-gray-300">
                            <span>{{ $event->date->format('d/m/Y H:i') }}</span>
                            <span class="text-[#fcbf49]">{{ $event->stadium->name }}</span>
                        </p>
                    </div>
                    <div class="reveal-element rounded-3xl border border-white/10 bg-[#151b2b]/80 p-5 backdrop-blur">
                        <p class="text-sm text-gray-400">{{ __('serko.events.available') }}</p>
                        <p class="font-display mt-1 text-5xl font-black text-[#fcbf49]">{{ $availableSeats }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-10 grid gap-8 lg:grid-cols-[1fr_24rem]">
        <div class="space-y-6">
            <div class="serko-card reveal-element p-8">
                <h2 class="font-display text-3xl font-black text-white">{{ __('serko.events.description') }}</h2>
                <div class="mt-4 leading-8 text-gray-300">
                    {!! $event->description !!}
                </div>
            </div>

            <div class="grid gap-4 md:grid-cols-3">
                <div class="serko-metric reveal-element">
                    <p class="text-sm text-gray-400">{{ __('serko.events.date') }}</p>
                    <p class="mt-2 font-bold text-white">{{ $event->date->format('d/m/Y H:i') }}</p>
                </div>
                <div class="serko-metric reveal-element">
                    <p class="text-sm text-gray-400">{{ __('serko.events.stadium') }}</p>
                    <p class="mt-2 font-bold text-white">{{ $event->stadium->name }}</p>
                </div>
                <div class="serko-metric reveal-element">
                    <p class="text-sm text-gray-400">{{ __('serko.stadiums.capacity') }}</p>
                    <p class="mt-2 font-bold text-white">{{ number_format($event->stadium->capacity) }}</p>
                </div>
            </div>
        </div>

        <aside class="serko-card reveal-element h-fit p-6 lg:sticky lg:top-28">
            <p class="serko-kicker">{{ __('serko.events.buy_box_title') }}</p>
            <div class="mt-6 flex items-end justify-between">
                <span class="text-gray-400">Desde</span>
                <span class="font-display text-4xl font-black text-white">{{ $lowestPrice ? number_format($lowestPrice, 2).' EUR' : '-' }}</span>
            </div>
            <p class="mt-4 text-sm leading-6 text-gray-400">{{ __('serko.events.buy_box_description') }}</p>
            <div class="mt-6">
                @auth
                    <a href="{{ route('orders.checkout', $event) }}" class="serko-button w-full">{{ __('serko.events.buy_now') }}</a>
                @else
                    <a href="{{ route('login') }}" class="serko-button w-full">{{ __('serko.events.login_to_buy') }}</a>
                @endauth
            </div>
            <div class="mt-4 rounded-2xl border border-white/10 bg-black/30 p-4 text-center text-xs text-gray-400">
                PayPal, QR inmediato y validacion segura de asientos.
            </div>
        </aside>
    </section>
@endsection
