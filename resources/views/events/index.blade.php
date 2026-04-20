@extends('layouts.app')

@section('content')
    <section class="space-y-6">
        <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <h1 class="serko-section-title">{{ __('serko.events.title') }}</h1>
                <p class="mt-2 text-slate-600">{{ __('serko.events.subtitle') }}</p>
            </div>
            <form method="GET" class="w-full md:max-w-sm">
                <x-input name="search" :value="request('search')" :placeholder="__('serko.events.search')" />
            </form>
        </div>

        <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($events as $event)
                <article class="serko-card overflow-hidden">
                    <div class="h-40 bg-[linear-gradient(135deg,#d62828,#fcbf49)]"></div>
                    <div class="space-y-4 px-6 py-6">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-[0.25em] text-red-700">{{ $event->competition->name }}</p>
                            <h2 class="mt-2 text-2xl font-bold">{{ $event->homeTeam->name }} vs {{ $event->awayTeam->name }}</h2>
                        </div>
                        <p class="text-sm text-slate-600">{{ $event->date->format('d/m/Y H:i') }} - {{ $event->stadium->name }}</p>
                        <a href="{{ route('events.show', $event) }}" class="serko-button w-full">{{ __('serko.events.view') }}</a>
                    </div>
                </article>
            @endforeach
        </div>

        {{ $events->links() }}
    </section>
@endsection
