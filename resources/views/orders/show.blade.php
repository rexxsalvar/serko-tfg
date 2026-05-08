@extends('layouts.app')

@section('content')
    <section class="space-y-8">
        <div class="serko-card reveal-element p-8">
            <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
                <div>
                    <p class="serko-kicker">{{ __('serko.orders.order') }} #{{ $order->id }}</p>
                    <h1 class="font-display mt-3 text-4xl font-black text-white">{{ __('serko.orders.completed') }}</h1>
                    <p class="mt-3 text-gray-400">{{ __('serko.orders.summary', ['total' => number_format($order->total_price, 2)]) }}</p>
                </div>
                <span class="serko-pill">{{ $order->payment?->status ?? $order->status }}</span>
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-2">
            @foreach ($order->tickets as $ticket)
                <article class="serko-glow-card reveal-element overflow-hidden">
                    <div class="bg-[#d62828] p-4 text-white">
                        <div class="flex items-center justify-between">
                            <span class="font-display font-black tracking-[0.2em]">SERKO PASS</span>
                            <span class="text-xs font-bold uppercase opacity-80">QR validado</span>
                        </div>
                    </div>
                    <div class="grid gap-5 p-6 md:grid-cols-[1fr_auto] md:items-center">
                        <div>
                            <p class="serko-kicker">{{ $ticket->event->competition?->name ?? 'SERKO' }}</p>
                            <h2 class="font-display mt-2 text-2xl font-black text-white">{{ $ticket->event->homeTeam->name }} vs {{ $ticket->event->awayTeam->name }}</h2>
                            <p class="mt-3 text-sm text-gray-400">{{ $ticket->event->date->format('d/m/Y H:i') }}</p>
                            <div class="mt-5 flex flex-wrap gap-3">
                                <span class="rounded-xl bg-black/30 px-3 py-2 text-sm font-bold text-white">{{ $ticket->seat->row }}-{{ $ticket->seat->number }}</span>
                                <span class="rounded-xl bg-black/30 px-3 py-2 text-sm font-bold text-[#fcbf49]">{{ number_format($ticket->price, 2) }} EUR</span>
                            </div>
                        </div>
                        <img src="data:image/svg+xml;base64,{{ $ticket->qr_code }}" alt="QR" class="h-32 w-32 rounded-2xl bg-white p-3 shadow-xl">
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endsection
