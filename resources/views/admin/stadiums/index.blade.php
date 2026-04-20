@extends('layouts.app')

@section('content')
    <section class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="serko-section-title">{{ __('serko.admin.stadiums_title') }}</h1>
                <p class="mt-2 text-slate-600">{{ __('serko.admin.stadiums_subtitle') }}</p>
            </div>
            <a href="{{ route('admin.stadiums.create') }}" class="serko-button">{{ __('serko.admin.new_stadium') }}</a>
        </div>

        <livewire:manage-stadiums />
    </section>
@endsection
