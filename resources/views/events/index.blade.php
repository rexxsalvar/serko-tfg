@extends('layouts.app')

@section('content')
    <section class="space-y-10">
        <div class="serko-card reveal-element overflow-hidden">
            <div class="relative px-8 py-10 md:px-10">
                <div class="absolute inset-y-0 right-0 hidden w-1/2 bg-[radial-gradient(circle_at_center,#d62828_0%,transparent_62%)] opacity-25 md:block"></div>
                <div class="relative flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
                    <div>
                        <p class="serko-kicker">{{ __('serko.events.title') }}</p>
                        <h1 class="font-display mt-3 text-4xl font-black text-white md:text-6xl">{{ __('serko.events.subtitle') }}</h1>
                    </div>
                    <form method="GET" class="w-full md:max-w-md">
                        <div class="relative">
                            <input name="search" value="{{ request('search') }}" placeholder="{{ __('serko.events.search') }}" class="serko-input pl-12">
                            <svg class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-6-6m2-5a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/></svg>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($events as $event)
                @php
                    $imageUrl = $event->stadium->imageUrl() ?? asset('images/stadiums/estadio-town.jpg');
                @endphp
                <article class="serko-glow-card reveal-element group flex min-h-[29rem] flex-col overflow-hidden">
                    <div class="relative h-52 overflow-hidden">
                        <img src="{{ $imageUrl }}" alt="{{ $event->stadium->name }}" class="h-full w-full object-cover transition duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#151b2b] via-black/45 to-transparent"></div>
                        <div class="absolute left-4 top-4 rounded-lg border border-[#fcbf49]/20 bg-black/60 px-3 py-1 text-xs font-black text-[#fcbf49] backdrop-blur">
                            {{ $event->competition->name }}
                        </div>
                    </div>
                    <div class="flex flex-1 flex-col p-6">
                        <div class="grid grid-cols-[1fr_auto_1fr] items-start gap-3">
                            <h2 class="font-display text-xl font-black text-white">{{ $event->homeTeam->name }}</h2>
                            <span class="mt-1 text-sm font-black text-gray-500">vs</span>
                            <h2 class="font-display text-right text-xl font-black text-white">{{ $event->awayTeam->name }}</h2>
                        </div>
                        <div class="mt-6 space-y-3 text-sm text-gray-400">
                            <p class="flex items-center gap-2">
                                <svg class="h-4 w-4 text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2Z"/></svg>
                                {{ $event->date->format('d/m/Y H:i') }}
                            </p>
                            <p class="flex items-center gap-2">
                                <svg class="h-4 w-4 text-[#fcbf49]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657 13.414 20.9a2 2 0 0 1-2.827 0l-4.244-4.243a8 8 0 1 1 11.314 0Z"/></svg>
                                {{ $event->stadium->name }}
                            </p>
                        </div>
                        <a href="{{ route('events.show', $event) }}" class="serko-button mt-auto w-full">{{ __('serko.events.view') }}</a>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="text-gray-300">
            {{ $events->links() }}
        </div>
    </section>
@endsection
