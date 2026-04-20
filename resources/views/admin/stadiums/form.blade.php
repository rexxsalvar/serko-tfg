@extends('layouts.app')

@section('content')
    <section class="serko-card px-8 py-8">
        <h1 class="text-3xl font-black">{{ $stadium->exists ? __('serko.admin.edit_stadium') : __('serko.admin.new_stadium') }}</h1>

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
                    <input type="hidden" name="image" id="stadium-image" value="{{ old('image', $stadium->image) }}">
                    <div data-dropzone data-target="#stadium-image" data-endpoint="{{ route('admin.media.store') }}" class="dropzone rounded-3xl border-2 border-dashed border-slate-300 bg-slate-50 p-6 text-sm text-slate-500">
                        {{ __('serko.admin.drag_drop') }}
                    </div>
                </div>
            </div>

            <button type="submit" class="serko-button">{{ __('serko.admin.save') }}</button>
        </form>
    </section>
@endsection
