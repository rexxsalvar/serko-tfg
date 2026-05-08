@extends('layouts.app')

@section('content')
    @php
        $image = $stadium->image;
        $imageUrl = $image ? (filter_var($image, FILTER_VALIDATE_URL) ? $image : asset('storage/'.$image)) : 'https://images.unsplash.com/photo-1489944440615-453fc2b6a9a9?q=80&w=2070&auto=format&fit=crop';
    @endphp

    <section class="space-y-8">
        <div class="serko-card reveal-element overflow-hidden">
            <div class="relative h-80">
                <img src="{{ $imageUrl }}" alt="{{ $stadium->name }}" class="h-full w-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-[#151b2b] via-black/40 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-8">
                    <p class="serko-kicker">{{ $stadium->city }}</p>
                    <h1 class="font-display mt-2 text-5xl font-black text-white">{{ $stadium->name }}</h1>
                    <p class="mt-3 text-gray-300">{{ number_format($stadium->capacity) }} {{ __('serko.stadiums.seats') }}</p>
                </div>
            </div>
        </div>

        <div class="grid gap-8 lg:grid-cols-2">
            <div class="serko-card reveal-element p-6">
                <h2 class="font-display text-2xl font-black text-white">{{ __('serko.stadiums.sectors_title') }}</h2>
                <div class="mt-5 grid gap-3">
                    @foreach ($stadium->sectors as $sector)
                        <div class="rounded-2xl border border-white/10 bg-black/25 px-4 py-4">
                            <p class="font-bold text-white">{{ $sector->name }}</p>
                            <p class="mt-1 text-sm text-gray-400">{{ $sector->type }} - {{ $sector->seats->count() }} {{ __('serko.stadiums.seats') }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="serko-card reveal-element p-6">
                <h2 class="font-display text-2xl font-black text-white">{{ __('serko.stadiums.upcoming_events') }}</h2>
                <div class="mt-5 grid gap-3">
                    @forelse ($stadium->events as $event)
                        <a href="{{ route('events.show', $event) }}" class="rounded-2xl border border-white/10 bg-black/25 px-4 py-4 transition hover:border-red-500/40 hover:bg-red-500/10">
                            <p class="font-bold text-white">{{ $event->homeTeam->name }} vs {{ $event->awayTeam->name }}</p>
                            <p class="mt-1 text-sm text-gray-400">{{ $event->date->format('d/m/Y H:i') }}</p>
                        </a>
                    @empty
                        <p class="text-gray-400">{{ __('serko.events.subtitle') }}</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection
