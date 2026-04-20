@extends('layouts.app')

@section('content')
    <section class="grid gap-6 lg:grid-cols-[1.15fr_0.85fr]">
        <div class="serko-card px-8 py-8">
            <p class="text-xs font-bold uppercase tracking-[0.25em] text-red-700">{{ $event->competition->name }}</p>
            <h1 class="mt-3 text-4xl font-black">{{ $event->homeTeam->name }} vs {{ $event->awayTeam->name }}</h1>
            <p class="mt-4 text-slate-600">{{ strip_tags($event->description) }}</p>

            <div class="mt-8 grid gap-4 md:grid-cols-3">
                <div class="rounded-3xl bg-slate-100 p-4">
                    <p class="text-sm text-slate-500">{{ __('serko.events.date') }}</p>
                    <p class="mt-2 font-semibold">{{ $event->date->format('d/m/Y H:i') }}</p>
                </div>
                <div class="rounded-3xl bg-slate-100 p-4">
                    <p class="text-sm text-slate-500">{{ __('serko.events.stadium') }}</p>
                    <p class="mt-2 font-semibold">{{ $event->stadium->name }}</p>
                </div>
                <div class="rounded-3xl bg-slate-100 p-4">
                    <p class="text-sm text-slate-500">{{ __('serko.events.available') }}</p>
                    <p class="mt-2 font-semibold">{{ $event->seats->where('pivot.status', 'available')->count() }}</p>
                </div>
            </div>
        </div>

        <div class="serko-card px-6 py-6">
            <h2 class="text-2xl font-bold">{{ __('serko.events.buy_box_title') }}</h2>
            <p class="mt-2 text-sm text-slate-600">{{ __('serko.events.buy_box_description') }}</p>
            <div class="mt-6">
                @auth
                    <a href="{{ route('orders.checkout', $event) }}" class="serko-button w-full">{{ __('serko.events.buy_now') }}</a>
                @else
                    <a href="{{ route('login') }}" class="serko-button w-full">{{ __('serko.events.login_to_buy') }}</a>
                @endauth
            </div>
        </div>
    </section>
@endsection
