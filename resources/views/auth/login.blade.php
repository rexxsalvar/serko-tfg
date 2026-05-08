@extends('layouts.app')

@section('content')
    <section class="-mx-4 -my-8 flex min-h-[calc(100vh-5rem)] items-center justify-center overflow-hidden px-4 py-12 md:-mx-8">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1574629810360-7efbbe195018?q=80&w=2069&auto=format&fit=crop')] bg-cover bg-center opacity-15"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-[#0b0f19] via-[#0b0f19]/80 to-[#0b0f19]/70"></div>

        <div class="serko-card reveal-element relative z-10 w-full max-w-md p-8">
            <div class="text-center">
                <img src="{{ asset('images/serko-logo.svg') }}" alt="SERKO" class="mx-auto h-16 w-16 rounded-2xl bg-red-600 p-2 shadow-xl shadow-red-950/40">
                <h1 class="font-display mt-5 text-3xl font-black text-white">{{ __('serko.auth.login') }}</h1>
                <p class="mt-2 text-sm text-gray-400">Inicia sesion para gestionar tus entradas y QR.</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-5">
                @csrf
                <div>
                    <label for="email" class="serko-label">{{ __('serko.auth.email') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" class="serko-input" required autofocus>
                    @error('email')
                        <p class="mt-2 text-sm font-bold text-red-300">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="serko-label">{{ __('serko.auth.password') }}</label>
                    <input id="password" type="password" name="password" class="serko-input" required>
                    @error('password')
                        <p class="mt-2 text-sm font-bold text-red-300">{{ $message }}</p>
                    @enderror
                </div>
                <x-checkbox name="remember" class="text-gray-400">
                    {{ __('serko.auth.remember') }}
                </x-checkbox>
                <button class="serko-button w-full" type="submit">{{ __('serko.auth.login') }}</button>
            </form>

            <p class="mt-6 text-center text-sm text-gray-500">
                {{ __('serko.nav.register') }}
                <a href="{{ route('register') }}" class="font-bold text-[#fcbf49] hover:text-white">{{ __('serko.auth.register') }}</a>
            </p>
        </div>
    </section>
@endsection
