@extends('layouts.app')

@section('content')
    <section class="space-y-10">
        <div class="serko-card reveal-element p-8 md:p-10">
            <p class="serko-kicker">{{ __('serko.stadiums.title') }}</p>
            <h1 class="font-display mt-3 text-4xl font-black text-white md:text-6xl">{{ __('serko.stadiums.subtitle') }}</h1>
        </div>

        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($stadiums as $stadium)
                @php
                    $image = $stadium->image;
                    $imageUrl = $image ? (filter_var($image, FILTER_VALIDATE_URL) ? $image : asset('storage/'.$image)) : 'https://images.unsplash.com/photo-1489944440615-453fc2b6a9a9?q=80&w=2070&auto=format&fit=crop';
                @endphp
                <article class="serko-glow-card reveal-element group overflow-hidden">
                    <div class="relative h-56 overflow-hidden">
                        <img src="{{ $imageUrl }}" alt="{{ $stadium->name }}" class="h-full w-full object-cover transition duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#151b2b] via-black/35 to-transparent"></div>
                        <span class="absolute left-4 top-4 rounded-lg bg-black/60 px-3 py-1 text-xs font-black text-[#fcbf49] backdrop-blur">{{ $stadium->city }}</span>
                    </div>
                    <div class="space-y-4 p-6">
                        <h2 class="font-display text-3xl font-black text-white">{{ $stadium->name }}</h2>
                        <div class="grid grid-cols-3 gap-3 text-center">
                            <div class="rounded-2xl bg-black/30 p-3">
                                <p class="text-xs text-gray-500">{{ __('serko.stadiums.capacity') }}</p>
                                <p class="font-black text-white">{{ number_format($stadium->capacity) }}</p>
                            </div>
                            <div class="rounded-2xl bg-black/30 p-3">
                                <p class="text-xs text-gray-500">{{ __('serko.stadiums.sectors_title') }}</p>
                                <p class="font-black text-white">{{ $stadium->sectors_count }}</p>
                            </div>
                            <div class="rounded-2xl bg-black/30 p-3">
                                <p class="text-xs text-gray-500">{{ __('serko.nav.events') }}</p>
                                <p class="font-black text-white">{{ $stadium->events_count }}</p>
                            </div>
                        </div>
                        <a href="{{ route('stadiums.show', $stadium) }}" class="serko-button w-full">{{ __('serko.stadiums.view') }}</a>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="text-gray-300">
            {{ $stadiums->links() }}
        </div>
    </section>
@endsection
