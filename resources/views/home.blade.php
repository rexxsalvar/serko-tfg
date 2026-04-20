@extends('layouts.app')

@section('content')
    <section class="grid gap-8 lg:grid-cols-[1.1fr_0.9fr]">
        <div class="serko-card px-8 py-10">
            <span class="mb-4 inline-flex rounded-full bg-red-50 px-3 py-1 text-xs font-bold uppercase tracking-[0.25em] text-red-700">
                {{ __('serko.hero.badge') }}
            </span>
            <h1 class="max-w-3xl text-5xl font-black tracking-tight text-slate-950 md:text-6xl">
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

        <div class="serko-card overflow-hidden">
            <div class="h-full bg-[radial-gradient(circle_at_top,#fcbf49_0%,#d62828_45%,#6a040f_100%)] p-8 text-white">
                <p class="text-sm uppercase tracking-[0.35em] text-white/70">{{ __('serko.hero.card_label') }}</p>
                <div class="mt-10 grid gap-5">
                    <div class="rounded-3xl bg-white/10 p-5 backdrop-blur">
                        <p class="text-sm text-white/70">{{ __('serko.stats.events') }}</p>
                        <p class="mt-1 text-4xl font-black">{{ \App\Models\Event::query()->upcomingEvents()->count() }}</p>
                    </div>
                    <div class="rounded-3xl bg-white/10 p-5 backdrop-blur">
                        <p class="text-sm text-white/70">{{ __('serko.stats.stadiums') }}</p>
                        <p class="mt-1 text-4xl font-black">{{ \App\Models\Stadium::query()->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
