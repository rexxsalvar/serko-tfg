@extends('layouts.app')

@section('content')
    <section class="space-y-6">
        <div class="serko-card px-8 py-8">
            <p class="text-xs font-bold uppercase tracking-[0.25em] text-red-700">{{ __('serko.orders.order') }} #{{ $order->id }}</p>
            <h1 class="mt-2 text-4xl font-black">{{ __('serko.orders.completed') }}</h1>
            <p class="mt-3 text-slate-600">{{ __('serko.orders.summary', ['total' => number_format($order->total_price, 2)]) }}</p>
        </div>

        <div class="grid gap-5 lg:grid-cols-2">
            @foreach ($order->tickets as $ticket)
                <article class="serko-card flex justify-between gap-4 px-6 py-6">
                    <div>
                        <h2 class="text-2xl font-bold">{{ $ticket->event->homeTeam->name }} vs {{ $ticket->event->awayTeam->name }}</h2>
                        <p class="mt-2 text-sm text-slate-600">{{ $ticket->seat->row }}-{{ $ticket->seat->number }} - {{ number_format($ticket->price, 2) }} EUR</p>
                    </div>
                    <img src="data:image/svg+xml;base64,{{ $ticket->qr_code }}" alt="QR" class="h-28 w-28 rounded-2xl bg-white p-2 shadow">
                </article>
            @endforeach
        </div>
    </section>
@endsection
