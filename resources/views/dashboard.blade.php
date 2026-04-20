@extends('layouts.app')

@section('content')
    <section class="space-y-6">
        <div>
            <h1 class="serko-section-title">{{ __('serko.dashboard.title') }}</h1>
            <p class="mt-2 text-slate-600">{{ __('serko.dashboard.subtitle') }}</p>
        </div>

        <div class="grid gap-4">
            @forelse ($tickets as $ticket)
                <article class="serko-card flex flex-col justify-between gap-4 px-6 py-5 md:flex-row md:items-center">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.25em] text-red-700">{{ __('serko.dashboard.ticket') }} #{{ $ticket->id }}</p>
                        <h2 class="mt-2 text-2xl font-bold">{{ $ticket->event->homeTeam->name }} vs {{ $ticket->event->awayTeam->name }}</h2>
                        <p class="mt-2 text-sm text-slate-600">{{ $ticket->event->date->format('d/m/Y H:i') }} - {{ $ticket->seat->row }}-{{ $ticket->seat->number }}</p>
                    </div>
                    <div class="rounded-3xl bg-slate-950 px-5 py-4 text-white">
                        <p class="text-xs uppercase tracking-[0.25em] text-white/60">QR</p>
                        <img src="data:image/png;base64,{{ $ticket->qr_code }}" alt="QR" class="mt-3 h-24 w-24 rounded-xl bg-white p-2">
                    </div>
                </article>
            @empty
                <div class="serko-card px-6 py-8 text-slate-600">
                    {{ __('serko.dashboard.empty') }}
                </div>
            @endforelse
        </div>
    </section>
@endsection
