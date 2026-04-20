@extends('layouts.app')

@section('content')
    <section class="mx-auto max-w-md serko-card px-8 py-8">
        <h1 class="text-3xl font-black">{{ __('serko.auth.register') }}</h1>
        <form method="POST" action="{{ route('register') }}" class="mt-6 space-y-4">
            @csrf
            <div>
                <x-label :value="__('serko.auth.name')" />
                <x-input name="name" />
            </div>
            <div>
                <x-label :value="__('serko.auth.email')" />
                <x-input type="email" name="email" />
            </div>
            <div>
                <x-label :value="__('serko.auth.password')" />
                <x-input type="password" name="password" />
            </div>
            <div>
                <x-label :value="__('serko.auth.password_confirmation')" />
                <x-input type="password" name="password_confirmation" />
            </div>
            <button class="serko-button w-full" type="submit">{{ __('serko.auth.register') }}</button>
        </form>
    </section>
@endsection
