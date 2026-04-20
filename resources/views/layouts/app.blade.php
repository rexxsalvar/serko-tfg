<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=sora:400,500,600,700,800" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@6.0.0-beta.2/dist/dropzone.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css">
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen">
        <div class="mx-auto flex min-h-screen max-w-7xl flex-col px-4 py-6 md:px-8">
            <header class="mb-8 serko-card px-6 py-4">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <a href="{{ route('home') }}" class="text-3xl font-black tracking-[0.2em] text-slate-950">SERKO</a>
                        <p class="text-sm text-slate-600">{{ __('serko.brand_tagline') }}</p>
                    </div>
                    <nav class="flex flex-wrap items-center gap-3 text-sm font-medium text-slate-700">
                        <a href="{{ route('events.index') }}">{{ __('serko.nav.events') }}</a>
                        <a href="{{ route('stadiums.index') }}">{{ __('serko.nav.stadiums') }}</a>
                        @auth
                            <a href="{{ route('dashboard') }}">{{ __('serko.nav.dashboard') }}</a>
                            @if(auth()->user()->hasRole('Admin'))
                                <a href="{{ route('admin.events.index') }}">{{ __('serko.nav.admin') }}</a>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit">{{ __('serko.nav.logout') }}</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}">{{ __('serko.nav.login') }}</a>
                            <a href="{{ route('register') }}">{{ __('serko.nav.register') }}</a>
                        @endauth
                        <a href="{{ route('locale.switch', 'es') }}">ES</a>
                        <a href="{{ route('locale.switch', 'en') }}">EN</a>
                    </nav>
                </div>
            </header>

            @if (session('status'))
                <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                    {{ session('status') }}
                </div>
            @endif

            <main class="flex-1">
                @yield('content')
            </main>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/dropzone@6.0.0-beta.2/dist/dropzone-min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.min.js"></script>
        @livewireScripts
        @stack('scripts')
    </body>
</html>
