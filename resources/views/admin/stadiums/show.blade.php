@extends('layouts.app')

@section('content')
    <section class="space-y-6">
        <div class="serko-card overflow-hidden">
            <img src="{{ $stadium->image ? asset('storage/'.$stadium->image) : 'https://placehold.co/1200x500?text=SERKO+Stadium' }}" alt="{{ $stadium->name }}" class="h-72 w-full object-cover">
            <div class="px-8 py-8">
                <h1 class="text-4xl font-black">{{ $stadium->name }}</h1>
                <p class="mt-2 text-slate-600">{{ $stadium->city }} - {{ number_format($stadium->capacity) }}</p>
            </div>
        </div>
    </section>
@endsection
