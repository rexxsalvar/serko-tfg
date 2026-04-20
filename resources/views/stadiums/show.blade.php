@extends('layouts.app')

@section('content')
    <section class="space-y-6">
        <div class="serko-card overflow-hidden">
            <img src="{{ $stadium->image ? asset('storage/'.$stadium->image) : 'https://placehold.co/1200x500?text=SERKO+Stadium' }}" alt="{{ $stadium->name }}" class="h-72 w-full object-cover">
            <div class="px-8 py-8">
                <h1 class="text-4xl font-black">{{ $stadium->name }}</h1>
                <p class="mt-3 text-slate-600">{{ $stadium->city }} - {{ number_format($stadium->capacity) }} {{ __('serko.stadiums.seats') }}</p>
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-2">
            <div class="serko-card px-6 py-6">
                <h2 class="text-2xl font-bold">{{ __('serko.stadiums.sectors_title') }}</h2>
                <div class="mt-4 grid gap-3">
                    @foreach ($stadium->sectors as $sector)
                        <div class="rounded-2xl bg-slate-100 px-4 py-3">
                            <p class="font-semibold">{{ $sector->name }}</p>
                            <p class="text-sm text-slate-600">{{ $sector->type }} - {{ $sector->seats->count() }} {{ __('serko.stadiums.seats') }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="serko-card px-6 py-6">
                <h2 class="text-2xl font-bold">{{ __('serko.stadiums.upcoming_events') }}</h2>
                <div class="mt-4 grid gap-3">
                    @foreach ($stadium->events as $event)
                        <a href="{{ route('events.show', $event) }}" class="rounded-2xl bg-slate-100 px-4 py-3 transition hover:bg-slate-200">
                            <p class="font-semibold">{{ $event->homeTeam->name }} vs {{ $event->awayTeam->name }}</p>
                            <p class="text-sm text-slate-600">{{ $event->date->format('d/m/Y H:i') }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
