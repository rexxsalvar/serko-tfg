@extends('layouts.app')

@section('content')
    <section class="space-y-8">
        <div class="serko-card reveal-element overflow-hidden">
            <div class="grid gap-0 lg:grid-cols-[1.2fr_0.8fr]">
                <div class="p-8 md:p-10">
                    <p class="serko-kicker">{{ __('serko.dashboard.kicker') }}</p>
                    <h1 class="font-display mt-3 text-4xl font-black tracking-tight text-white md:text-6xl">
                        {{ __('serko.dashboard.title') }}
                    </h1>
                    <p class="mt-4 max-w-2xl text-gray-400">{{ __('serko.dashboard.subtitle') }}</p>
                    <div class="mt-7 flex flex-wrap gap-3">
                        <a href="{{ route('events.index') }}" class="serko-button">{{ __('serko.dashboard.browse_events') }}</a>
                        <a href="{{ route('orders.index') }}" class="serko-button-secondary">{{ __('serko.dashboard.view_orders') }}</a>
                    </div>
                </div>
                <div class="bg-[radial-gradient(circle_at_top,#fcbf49_0%,#d62828_45%,#6a040f_100%)] p-6 text-white">
                    <div class="grid h-full gap-4 sm:grid-cols-3 lg:grid-cols-1">
                        <a href="{{ route('dashboard') }}" class="rounded-3xl bg-white/10 p-5 backdrop-blur transition hover:bg-white/15">
                            <p class="text-sm text-white/70">{{ __('serko.dashboard.tickets') }}</p>
                            <p class="font-display mt-2 text-4xl font-black">{{ $ticketTotal }}</p>
                        </a>
                        <a href="{{ route('orders.index') }}" class="rounded-3xl bg-white/10 p-5 backdrop-blur transition hover:bg-white/15">
                            <p class="text-sm text-white/70">{{ __('serko.dashboard.orders') }}</p>
                            <p class="font-display mt-2 text-4xl font-black">{{ $orderTotal }}</p>
                        </a>
                        <div class="rounded-3xl bg-white/10 p-5 backdrop-blur">
                            <p class="text-sm text-white/70">{{ __('serko.dashboard.upcoming') }}</p>
                            <p class="font-display mt-2 text-4xl font-black">{{ $upcomingTotal }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid gap-8 lg:grid-cols-[1fr_0.9fr]">
            <div class="space-y-4">
                <div>
                    <p class="serko-kicker">{{ __('serko.dashboard.latest_tickets') }}</p>
                    <h2 class="font-display mt-2 text-2xl font-black text-white">{{ __('serko.dashboard.ticket') }} QR</h2>
                </div>

                @forelse ($tickets as $ticket)
                    <article class="serko-glow-card reveal-element flex flex-col justify-between gap-5 p-6 md:flex-row md:items-center">
                        <div>
                            <p class="serko-kicker">{{ __('serko.dashboard.ticket') }} #{{ $ticket->id }}</p>
                            <h3 class="font-display mt-2 text-2xl font-black text-white">{{ $ticket->event->homeTeam->name }} vs {{ $ticket->event->awayTeam->name }}</h3>
                            <p class="mt-2 text-sm text-gray-400">
                                {{ $ticket->event->date->format('d/m/Y H:i') }} - {{ $ticket->seat->row }}-{{ $ticket->seat->number }}
                            </p>
                        </div>
                        <div class="rounded-3xl bg-white p-3">
                            <img src="data:image/svg+xml;base64,{{ $ticket->qr_code }}" alt="QR" class="h-24 w-24">
                        </div>
                    </article>
                @empty
                    <div class="serko-card px-6 py-8 text-gray-400">
                        {{ __('serko.dashboard.empty') }}
                    </div>
                @endforelse
            </div>

            <aside class="space-y-5">
                <div class="serko-card reveal-element p-6">
                    <p class="serko-kicker">{{ __('serko.dashboard.recent_orders') }}</p>
                    <div class="mt-5 space-y-3">
                        @forelse ($orders as $order)
                            <a href="{{ route('orders.show', $order) }}" class="block rounded-3xl border border-white/10 bg-black/25 px-4 py-4 transition hover:border-red-500/40 hover:bg-red-500/10">
                                <div class="flex items-center justify-between gap-3">
                                    <span class="font-bold text-white">{{ __('serko.orders.order') }} #{{ $order->id }}</span>
                                    <span class="serko-pill">{{ $order->payment?->status ?? $order->status }}</span>
                                </div>
                                <p class="mt-2 text-sm text-gray-400">{{ $order->tickets_count }} {{ __('serko.dashboard.tickets') }} - {{ number_format($order->total_price, 2) }} EUR</p>
                            </a>
                        @empty
                            <p class="text-sm text-gray-400">{{ __('serko.orders.empty') }}</p>
                        @endforelse
                    </div>
                </div>

                <div class="serko-card reveal-element p-6">
                    <p class="serko-kicker">{{ __('serko.dashboard.next_match') }}</p>
                    @if ($upcomingTickets->first())
                        @php($nextTicket = $upcomingTickets->sortBy('event.date')->first())
                        <h2 class="font-display mt-3 text-2xl font-black text-white">{{ $nextTicket->event->homeTeam->name }} vs {{ $nextTicket->event->awayTeam->name }}</h2>
                        <p class="mt-2 text-sm text-gray-400">{{ $nextTicket->event->date->format('d/m/Y H:i') }}</p>
                        <p class="mt-4 serko-pill">{{ $nextTicket->seat->row }}-{{ $nextTicket->seat->number }}</p>
                    @else
                        <p class="mt-3 text-sm text-gray-400">{{ __('serko.dashboard.empty') }}</p>
                    @endif
                </div>
            </aside>
        </div>
    </section>
@endsection
