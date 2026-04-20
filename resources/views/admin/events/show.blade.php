@extends('layouts.app')

@section('content')
    <section class="serko-card px-8 py-8">
        <h1 class="text-4xl font-black">{{ $event->homeTeam->name }} vs {{ $event->awayTeam->name }}</h1>
        <p class="mt-3 text-slate-600">{{ $event->date->format('d/m/Y H:i') }} - {{ $event->stadium->name }}</p>
        <div class="mt-6 grid gap-3 md:grid-cols-3">
            @foreach ($event->seats->take(12) as $seat)
                <div class="rounded-2xl bg-slate-100 px-4 py-3">
                    <p class="font-semibold">{{ $seat->sector->name }} / {{ $seat->row }}-{{ $seat->number }}</p>
                    <p class="text-sm text-slate-600">{{ $seat->pivot->status }} - {{ number_format($seat->pivot->price, 2) }} EUR</p>
                </div>
            @endforeach
        </div>
    </section>
@endsection
