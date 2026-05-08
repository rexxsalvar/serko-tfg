@extends('layouts.app')

@section('content')
    @php
        $featuredEvents = \App\Models\Event::query()
            ->with(['stadium', 'competition', 'homeTeam', 'awayTeam'])
            ->withCount(['seats as available_seats_count' => fn ($query) => $query->where('event_seat.status', 'available')])
            ->upcomingEvents()
            ->take(3)
            ->get();
        $upcomingCount = \App\Models\Event::query()->upcomingEvents()->count();
        $stadiumCount = \App\Models\Stadium::query()->count();
        $soldTickets = \App\Models\Ticket::query()->count();
    @endphp

    <section class="-mx-4 -mt-8 overflow-hidden md:-mx-8">
        <div class="relative min-h-[82vh] px-4 py-20 md:px-8 md:py-28">
            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1517466787929-bc90951d0974?q=80&w=2074&auto=format&fit=crop')] bg-cover bg-center"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-[#0b0f19]/40 via-[#0b0f19]/70 to-[#0b0f19]"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-[#0b0f19] via-[#0b0f19]/85 to-transparent"></div>

            <div class="relative mx-auto grid max-w-7xl items-center gap-12 lg:grid-cols-[1.05fr_0.95fr]">
                <div class="reveal-element active space-y-8">
                    <x-badge class="border-red-500/30 bg-red-500/10 text-red-300">
                        <span class="h-2 w-2 rounded-full bg-red-500"></span>
                        {{ __('serko.hero.badge') }}
                    </x-badge>
                    <h1 class="font-display max-w-5xl text-5xl font-black leading-[1.05] tracking-tight text-white md:text-7xl">
                        {{ __('serko.hero.title') }}
                    </h1>
                    <p class="max-w-2xl text-lg leading-8 text-gray-300 md:text-xl">
                        {{ __('serko.hero.description') }}
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('events.index') }}" class="serko-button">{{ __('serko.hero.cta_primary') }}</a>
                        <a href="{{ route('stadiums.index') }}" class="serko-button-secondary">{{ __('serko.hero.cta_secondary') }}</a>
                    </div>
                </div>

                <div class="reveal-element relative hidden lg:block">
                    <div class="absolute -inset-4 rounded-3xl bg-gradient-to-r from-red-600 to-amber-400 opacity-30 blur-2xl"></div>
                    <div class="relative rounded-3xl border border-white/10 bg-[#151b2b]/80 p-6 shadow-2xl shadow-black/50 backdrop-blur-xl">
                        <div class="mb-6 flex items-center justify-between">
                            <h2 class="font-display text-xl font-bold text-white">{{ __('serko.hero.card_label') }}</h2>
                            <span class="text-sm font-bold text-[#fcbf49]">● Live</span>
                        </div>
                        <div class="space-y-4">
                            @forelse ($featuredEvents->take(2) as $event)
                                <a href="{{ route('events.show', $event) }}" class="flex items-center justify-between rounded-2xl border border-white/5 bg-black/35 p-4 transition hover:border-red-500/40">
                                    <div>
                                        <p class="text-xs font-bold uppercase tracking-[0.25em] text-gray-500">{{ $event->competition->name }}</p>
                                        <p class="mt-1 font-bold text-white">{{ $event->homeTeam->name }} vs {{ $event->awayTeam->name }}</p>
                                    </div>
                                    <span class="text-xs font-black text-red-300">{{ $event->available_seats_count }} seats</span>
                                </a>
                            @empty
                                <div class="rounded-2xl border border-white/5 bg-black/35 p-4 text-gray-400">{{ __('serko.events.subtitle') }}</div>
                            @endforelse
                        </div>
                        <div class="mt-6 grid grid-cols-3 gap-4">
                            <div class="rounded-2xl border border-white/5 bg-black/35 p-4">
                                <p class="text-xs uppercase tracking-[0.22em] text-gray-500">{{ __('serko.stats.events') }}</p>
                                <p class="font-display mt-2 text-3xl font-black">{{ $upcomingCount }}</p>
                            </div>
                            <div class="rounded-2xl border border-white/5 bg-black/35 p-4">
                                <p class="text-xs uppercase tracking-[0.22em] text-gray-500">{{ __('serko.stats.stadiums') }}</p>
                                <p class="font-display mt-2 text-3xl font-black">{{ $stadiumCount }}</p>
                            </div>
                            <div class="rounded-2xl border border-white/5 bg-black/35 p-4">
                                <p class="text-xs uppercase tracking-[0.22em] text-gray-500">{{ __('serko.nav.tickets') }}</p>
                                <p class="font-display mt-2 text-3xl font-black text-[#fcbf49]">{{ $soldTickets }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="space-y-10 py-16">
        <div class="flex flex-col justify-between gap-4 md:flex-row md:items-end">
            <div class="reveal-element">
                <p class="serko-kicker">{{ __('serko.events.title') }}</p>
                <h2 class="font-display mt-3 text-4xl font-black text-white">{{ __('serko.events.subtitle') }}</h2>
            </div>
            <a href="{{ route('events.index') }}" class="serko-button-secondary w-fit">{{ __('serko.hero.cta_primary') }}</a>
        </div>

        <div class="grid gap-6 md:grid-cols-3">
            @forelse ($featuredEvents as $event)
                @php
                    $image = $event->stadium->image;
                    $imageUrl = $image ? (filter_var($image, FILTER_VALIDATE_URL) ? $image : asset('storage/'.$image)) : 'https://images.unsplash.com/photo-1522778119026-d647f0565c6a?q=80&w=2070&auto=format&fit=crop';
                @endphp
                <a href="{{ route('events.show', $event) }}" class="serko-glow-card reveal-element group flex min-h-[28rem] flex-col overflow-hidden">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ $imageUrl }}" alt="{{ $event->stadium->name }}" class="h-full w-full object-cover transition duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#151b2b] via-[#151b2b]/45 to-transparent"></div>
                        <span class="absolute left-4 top-4 rounded-lg border border-[#fcbf49]/20 bg-black/60 px-3 py-1 text-xs font-black text-[#fcbf49] backdrop-blur">{{ $event->competition->name }}</span>
                    </div>
                    <div class="flex flex-1 flex-col p-6">
                        <h3 class="font-display text-2xl font-black text-white transition group-hover:text-red-300">{{ $event->homeTeam->name }} vs {{ $event->awayTeam->name }}</h3>
                        <p class="mt-4 text-sm text-gray-400">{{ $event->date->format('d/m/Y H:i') }} - {{ $event->stadium->name }}</p>
                        <div class="mt-auto flex items-center justify-between border-t border-white/5 pt-5">
                            <span class="serko-pill">{{ $event->available_seats_count }} {{ __('serko.events.available') }}</span>
                            <span class="text-sm font-black text-[#fcbf49]">{{ __('serko.events.view') }}</span>
                        </div>
                    </div>
                </a>
            @empty
                <div class="serko-card px-6 py-8 text-gray-400 md:col-span-3">{{ __('serko.events.subtitle') }}</div>
            @endforelse
        </div>
    </section>
@endsection
