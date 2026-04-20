@extends('layouts.app')

@section('content')
    <section class="space-y-6">
        <div>
            <h1 class="serko-section-title">{{ __('serko.stadiums.title') }}</h1>
            <p class="mt-2 text-slate-600">{{ __('serko.stadiums.subtitle') }}</p>
        </div>

        <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($stadiums as $stadium)
                <article class="serko-card overflow-hidden">
                    <img src="{{ $stadium->image ? asset('storage/'.$stadium->image) : 'https://placehold.co/800x500?text=SERKO' }}" alt="{{ $stadium->name }}" class="h-48 w-full object-cover">
                    <div class="space-y-3 px-6 py-6">
                        <h2 class="text-2xl font-bold">{{ $stadium->name }}</h2>
                        <p class="text-sm text-slate-600">{{ $stadium->city }} - {{ number_format($stadium->capacity) }} {{ __('serko.stadiums.seats') }}</p>
                        <a href="{{ route('stadiums.show', $stadium) }}" class="serko-button w-full">{{ __('serko.stadiums.view') }}</a>
                    </div>
                </article>
            @endforeach
        </div>

        {{ $stadiums->links() }}
    </section>
@endsection
