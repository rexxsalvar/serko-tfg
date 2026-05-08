@extends('layouts.app')

@section('content')
    <section class="-mx-4 -my-8 flex min-h-[calc(100vh-5rem)] items-center justify-center overflow-hidden px-4 py-12 md:-mx-8">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1508098682722-e99c43a406b2?q=80&w=2070&auto=format&fit=crop')] bg-cover bg-center opacity-15"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-[#0b0f19] via-[#0b0f19]/80 to-[#0b0f19]/70"></div>

        <div class="serko-card reveal-element relative z-10 w-full max-w-lg p-8">
            <div class="text-center">
                <img src="{{ asset('images/serko-logo.svg') }}" alt="SERKO" class="mx-auto h-16 w-16 rounded-2xl bg-red-600 p-2 shadow-xl shadow-red-950/40">
                <h1 class="font-display mt-5 text-3xl font-black text-white">{{ __('serko.auth.register') }}</h1>
                <p class="mt-2 text-sm text-gray-400">Crea tu cuenta y recibe tus entradas con QR inmediato.</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-5">
                @csrf
                <div>
                    <label for="name" class="serko-label">{{ __('serko.auth.name') }}</label>
                    <input id="name" name="name" value="{{ old('name') }}" class="serko-input" required>
                    @error('name')<p class="mt-2 text-sm font-bold text-red-300">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="email" class="serko-label">{{ __('serko.auth.email') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" class="serko-input" required>
                    @error('email')<p class="mt-2 text-sm font-bold text-red-300">{{ $message }}</p>@enderror
                </div>
                <div class="grid gap-5 md:grid-cols-2">
                    <div>
                        <label for="password" class="serko-label">{{ __('serko.auth.password') }}</label>
                        <input id="password" type="password" name="password" class="serko-input" required>
                        @error('password')<p class="mt-2 text-sm font-bold text-red-300">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="serko-label">{{ __('serko.auth.password_confirmation') }}</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" class="serko-input" required>
                    </div>
                </div>
                <button class="serko-button w-full" type="submit">{{ __('serko.auth.register') }}</button>
            </form>
        </div>
    </section>
@endsection
