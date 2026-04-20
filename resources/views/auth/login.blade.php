@extends('layouts.app')

@section('content')
    <section class="mx-auto max-w-md serko-card px-8 py-8">
        <h1 class="text-3xl font-black">{{ __('serko.auth.login') }}</h1>
        <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-4">
            @csrf
            <div>
                <x-label :value="__('serko.auth.email')" />
                <x-input type="email" name="email" />
            </div>
            <div>
                <x-label :value="__('serko.auth.password')" />
                <x-input type="password" name="password" />
            </div>
            <x-checkbox name="remember">{{ __('serko.auth.remember') }}</x-checkbox>
            <button class="serko-button w-full" type="submit">{{ __('serko.auth.login') }}</button>
        </form>
    </section>
@endsection
