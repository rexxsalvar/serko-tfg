@extends('layouts.app')

@section('content')
    <section class="serko-card px-8 py-8">
        <h1 class="font-display text-3xl font-black text-white">{{ $stadium->exists ? __('serko.admin.edit_stadium') : __('serko.admin.new_stadium') }}</h1>

        <form method="POST" action="{{ $stadium->exists ? route('admin.stadiums.update', $stadium) : route('admin.stadiums.store') }}" class="mt-6 space-y-5">
            @csrf
            @if($stadium->exists)
                @method('PUT')
            @endif

            <div class="grid gap-5 md:grid-cols-2">
                <div>
                    <x-label :value="__('serko.stadiums.name')" />
                    <x-input name="name" :value="old('name', $stadium->name)" />
                </div>
                <div>
                    <x-label :value="__('serko.stadiums.city')" />
                    <x-input name="city" :value="old('city', $stadium->city)" />
                </div>
                <div>
                    <x-label :value="__('serko.stadiums.capacity')" />
                    <x-input type="number" name="capacity" :value="old('capacity', $stadium->capacity)" />
                </div>
                <div>
                    <x-label value="Image" />
                    <x-file-upload name="image" target="#stadium-image" :endpoint="route('admin.media.store')" :value="$stadium->image">
                        {{ __('serko.admin.drag_drop') }}
                    </x-file-upload>
                </div>
            </div>

            <x-button type="submit">{{ __('serko.admin.save') }}</x-button>
        </form>
    </section>
@endsection
