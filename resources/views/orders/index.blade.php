@extends('layouts.app')

@section('content')
    <section class="space-y-6">
        <div class="serko-card serko-reveal px-8 py-8">
            <p class="serko-kicker">{{ __('serko.orders.history_kicker') }}</p>
            <h1 class="mt-3 text-4xl font-black tracking-tight text-slate-950">{{ __('serko.orders.history_title') }}</h1>
            <p class="mt-3 max-w-2xl text-slate-600">{{ __('serko.orders.history_subtitle') }}</p>
        </div>

        <div class="grid gap-4">
            @forelse ($orders as $order)
                <a href="{{ route('orders.show', $order) }}" class="serko-card group flex flex-col justify-between gap-5 px-6 py-5 transition hover:-translate-y-1 md:flex-row md:items-center">
                    <div>
                        <p class="serko-kicker">{{ __('serko.orders.order') }} #{{ $order->id }}</p>
                        <h2 class="mt-2 text-2xl font-bold text-slate-950">{{ $order->tickets->first()?->event->homeTeam->name }} vs {{ $order->tickets->first()?->event->awayTeam->name }}</h2>
                        <p class="mt-2 text-sm text-slate-600">{{ $order->created_at->format('d/m/Y H:i') }} - {{ $order->tickets->count() }} {{ __('serko.dashboard.tickets') }}</p>
                    </div>
                    <div class="text-left md:text-right">
                        <span class="serko-pill">{{ $order->payment?->status ?? $order->status }}</span>
                        <p class="mt-3 text-2xl font-black text-slate-950">{{ number_format($order->total_price, 2) }} EUR</p>
                    </div>
                </a>
            @empty
                <div class="serko-card px-6 py-8 text-slate-600">{{ __('serko.orders.empty') }}</div>
            @endforelse
        </div>

        {{ $orders->links() }}
    </section>
@endsection
