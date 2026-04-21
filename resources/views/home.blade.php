@extends('layouts.app')

@section('content')
    @php
        $featuredEvents = \App\Models\Event::query()
            ->with(['stadium', 'competition', 'homeTeam', 'awayTeam'])
            ->withCount(['seats as available_seats_count' => fn ($query) => $query->where('event_seat.status', 'available')])
            ->upcomingEvents()
            ->take(3)
            ->get();
    @endphp

    <section class="space-y-8">
        <div class="grid gap-8 lg:grid-cols-[1.1fr_0.9fr]">
            <div class="serko-card serko-reveal px-8 py-10 md:px-10 md:py-12">
                <x-badge class="mb-4">{{ __('serko.hero.badge') }}</x-badge>
                <h1 class="max-w-4xl text-5xl font-black tracking-tight text-slate-950 md:text-7xl">
                    {{ __('serko.hero.title') }}
                </h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-600">
                    {{ __('serko.hero.description') }}
                </p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="{{ route('events.index') }}" class="serko-button">{{ __('serko.hero.cta_primary') }}</a>
                    <a href="{{ route('stadiums.index') }}" class="serko-button-secondary">{{ __('serko.hero.cta_secondary') }}</a>
                </div>
            </div>

            <div class="serko-card-dark serko-reveal overflow-hidden">
                <div class="h-full bg-[radial-gradient(circle_at_top,#fcbf49_0%,#d62828_43%,#111827_100%)] p-8">
                    <p class="text-sm uppercase tracking-[0.35em] text-white/70">{{ __('serko.hero.card_label') }}</p>
                    <div class="mt-10 grid gap-5">
                        <div class="rounded-3xl bg-white/10 p-5 backdrop-blur">
                            <p class="text-sm text-white/70">{{ __('serko.stats.events') }}</p>
                            <p class="mt-1 text-5xl font-black">{{ \App\Models\Event::query()->upcomingEvents()->count() }}</p>
                        </div>
                        <div class="rounded-3xl bg-white/10 p-5 backdrop-blur">
                            <p class="text-sm text-white/70">{{ __('serko.stats.stadiums') }}</p>
                            <p class="mt-1 text-5xl font-black">{{ \App\Models\Stadium::query()->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid gap-5 md:grid-cols-3">
            @forelse ($featuredEvents as $event)
                <a href="{{ route('events.show', $event) }}" class="serko-card group overflow-hidden transition hover:-translate-y-1">
                    <div class="h-2 bg-gradient-to-r from-red-700 via-red-500 to-amber-400"></div>
                    <div class="px-6 py-6">
                        <p class="serko-kicker">{{ $event->competition->name }}</p>
                        <h2 class="mt-3 text-2xl font-black text-slate-950">{{ $event->homeTeam->name }} vs {{ $event->awayTeam->name }}</h2>
                        <p class="mt-3 text-sm text-slate-600">{{ $event->date->format('d/m/Y H:i') }} - {{ $event->stadium->name }}</p>
                        <div class="mt-5 flex items-center justify-between">
                            <span class="serko-pill">{{ $event->available_seats_count }} {{ __('serko.events.available') }}</span>
                            <span class="text-sm font-bold text-red-700">{{ __('serko.events.view') }}</span>
                        </div>
                    </div>
                </a>
            @empty
                <div class="serko-card px-6 py-8 text-slate-600 md:col-span-3">{{ __('serko.events.subtitle') }}</div>
            @endforelse
        </div>
    </section>
@endsection
