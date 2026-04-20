@extends('layouts.app')

@section('content')
    <section class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="serko-section-title">{{ __('serko.admin.events_title') }}</h1>
                <p class="mt-2 text-slate-600">{{ __('serko.admin.events_subtitle') }}</p>
            </div>
            <a href="{{ route('admin.events.create') }}" class="serko-button">{{ __('serko.admin.new_event') }}</a>
        </div>

        <livewire:manage-events />
    </section>
@endsection
