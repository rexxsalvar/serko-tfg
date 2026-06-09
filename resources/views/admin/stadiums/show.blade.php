@extends('layouts.app')

@section('content')
    <section class="space-y-6">
        <div class="serko-card overflow-hidden">
            @php($stadiumImage = $stadium->imageUrl() ?? asset('images/stadiums/estadio-ville.jpg'))
            <img src="{{ $stadiumImage }}" alt="{{ $stadium->name }}" class="h-72 w-full object-cover">
            <div class="px-8 py-8">
                <h1 class="font-display text-4xl font-black text-white">{{ $stadium->name }}</h1>
                <p class="mt-2 text-gray-400">{{ $stadium->city }} - {{ number_format($stadium->capacity) }}</p>
            </div>
        </div>
    </section>
@endsection
