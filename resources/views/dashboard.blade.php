@extends('layouts.app')

@section('content')
    <section class="space-y-6">
        <div class="serko-card serko-reveal overflow-hidden">
            <div class="grid gap-0 lg:grid-cols-[1.2fr_0.8fr]">
                <div class="px-8 py-9">
                    <p class="serko-kicker">{{ __('serko.dashboard.kicker') }}</p>
                    <h1 class="mt-3 text-4xl font-black tracking-tight text-slate-950 md:text-5xl">
                        {{ __('serko.dashboard.title') }}
                    </h1>
                    <p class="mt-4 max-w-2xl text-slate-600">{{ __('serko.dashboard.subtitle') }}</p>
                    <div class="mt-7 flex flex-wrap gap-3">
                        <a href="{{ route('events.index') }}" class="serko-button">{{ __('serko.dashboard.browse_events') }}</a>
                        <a href="{{ route('orders.index') }}" class="serko-button-secondary">{{ __('serko.dashboard.view_orders') }}</a>
                    </div>
                </div>
                <div class="bg-[radial-gradient(circle_at_top,#fcbf49_0%,#d62828_45%,#6a040f_100%)] p-6 text-white">
                    <div class="grid h-full gap-4 sm:grid-cols-3 lg:grid-cols-1">
                        <div class="rounded-3xl bg-white/12 p-5 backdrop-blur">
                            <p class="text-sm text-white/70">{{ __('serko.dashboard.tickets') }}</p>
                            <p class="mt-2 text-4xl font-black">{{ $ticketTotal }}</p>
                        </div>
                        <div class="rounded-3xl bg-white/12 p-5 backdrop-blur">
                            <p class="text-sm text-white/70">{{ __('serko.dashboard.orders') }}</p>
                            <p class="mt-2 text-4xl font-black">{{ $orderTotal }}</p>
                        </div>
                        <div class="rounded-3xl bg-white/12 p-5 backdrop-blur">
                            <p class="text-sm text-white/70">{{ __('serko.dashboard.upcoming') }}</p>
                            <p class="mt-2 text-4xl font-black">{{ $upcomingTotal }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-[1fr_0.9fr]">
            <div class="space-y-4">
                <div class="flex items-end justify-between gap-4">
                    <div>
                        <p class="serko-kicker">{{ __('serko.dashboard.latest_tickets') }}</p>
                        <h2 class="mt-2 text-2xl font-black text-slate-950">{{ __('serko.dashboard.ticket') }} QR</h2>
                    </div>
                </div>

                @forelse ($tickets as $ticket)
                    <article class="serko-card flex flex-col justify-between gap-5 px-6 py-5 transition hover:-translate-y-1 md:flex-row md:items-center">
                        <div>
                            <p class="serko-kicker">{{ __('serko.dashboard.ticket') }} #{{ $ticket->id }}</p>
                            <h3 class="mt-2 text-2xl font-bold">{{ $ticket->event->homeTeam->name }} vs {{ $ticket->event->awayTeam->name }}</h3>
                            <p class="mt-2 text-sm text-slate-600">
                                {{ $ticket->event->date->format('d/m/Y H:i') }} - {{ $ticket->seat->row }}-{{ $ticket->seat->number }}
                            </p>
                        </div>
                        <div class="rounded-3xl bg-slate-950 px-5 py-4 text-white">
                            <p class="text-xs uppercase tracking-[0.25em] text-white/60">QR</p>
                            <img src="data:image/svg+xml;base64,{{ $ticket->qr_code }}" alt="QR" class="mt-3 h-24 w-24 rounded-xl bg-white p-2">
                        </div>
                    </article>
                @empty
                    <div class="serko-card px-6 py-8 text-slate-600">
                        {{ __('serko.dashboard.empty') }}
                    </div>
                @endforelse
            </div>

            <aside class="space-y-4">
                <div class="serko-card px-6 py-6">
                    <p class="serko-kicker">{{ __('serko.dashboard.recent_orders') }}</p>
                    <div class="mt-5 space-y-3">
                        @forelse ($orders as $order)
                            <a href="{{ route('orders.show', $order) }}" class="block rounded-3xl border border-slate-100 bg-white/70 px-4 py-4 transition hover:border-red-200 hover:bg-red-50/50">
                                <div class="flex items-center justify-between gap-3">
                                    <span class="font-bold text-slate-950">{{ __('serko.orders.order') }} #{{ $order->id }}</span>
                                    <span class="serko-pill">{{ $order->payment?->status ?? $order->status }}</span>
                                </div>
                                <p class="mt-2 text-sm text-slate-600">{{ $order->tickets_count }} {{ __('serko.dashboard.tickets') }} - {{ number_format($order->total_price, 2) }} EUR</p>
                            </a>
                        @empty
                            <p class="text-sm text-slate-600">{{ __('serko.orders.empty') }}</p>
                        @endforelse
                    </div>
                </div>

                <div class="serko-card px-6 py-6">
                    <p class="serko-kicker">{{ __('serko.dashboard.next_match') }}</p>
                    @if ($upcomingTickets->first())
                        @php($nextTicket = $upcomingTickets->sortBy('event.date')->first())
                        <h2 class="mt-3 text-2xl font-black">{{ $nextTicket->event->homeTeam->name }} vs {{ $nextTicket->event->awayTeam->name }}</h2>
                        <p class="mt-2 text-sm text-slate-600">{{ $nextTicket->event->date->format('d/m/Y H:i') }}</p>
                        <p class="mt-4 serko-pill">{{ $nextTicket->seat->row }}-{{ $nextTicket->seat->number }}</p>
                    @else
                        <p class="mt-3 text-sm text-slate-600">{{ __('serko.dashboard.empty') }}</p>
                    @endif
                </div>
            </aside>
        </div>
    </section>
@endsection
