@extends('layouts.app')

@section('content')
    <section class="space-y-8">
        <div class="serko-card reveal-element p-8">
            <p class="serko-kicker">{{ __('serko.orders.history_kicker') }}</p>
            <h1 class="font-display mt-3 text-4xl font-black text-white md:text-5xl">{{ __('serko.orders.history_title') }}</h1>
            <p class="mt-3 max-w-2xl text-gray-400">{{ __('serko.orders.history_subtitle') }}</p>
        </div>

        <div class="grid gap-4">
            @forelse ($orders as $order)
                <a href="{{ route('orders.show', $order) }}" class="serko-glow-card reveal-element flex flex-col justify-between gap-5 p-6 md:flex-row md:items-center">
                    <div>
                        <p class="serko-kicker">{{ __('serko.orders.order') }} #{{ $order->id }}</p>
                        <h2 class="font-display mt-2 text-2xl font-black text-white">{{ $order->tickets->first()?->event->homeTeam->name }} vs {{ $order->tickets->first()?->event->awayTeam->name }}</h2>
                        <p class="mt-2 text-sm text-gray-400">{{ $order->created_at->format('d/m/Y H:i') }} - {{ $order->tickets->count() }} {{ __('serko.dashboard.tickets') }}</p>
                    </div>
                    <div class="text-left md:text-right">
                        <span class="serko-pill">{{ $order->payment?->status ?? $order->status }}</span>
                        <p class="font-display mt-3 text-3xl font-black text-[#fcbf49]">{{ number_format($order->total_price, 2) }} EUR</p>
                    </div>
                </a>
            @empty
                <div class="serko-card px-6 py-8 text-gray-400">{{ __('serko.orders.empty') }}</div>
            @endforelse
        </div>

        <div class="text-gray-300">
            {{ $orders->links() }}
        </div>
    </section>
@endsection
