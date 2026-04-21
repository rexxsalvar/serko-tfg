<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>
        <link rel="icon" href="{{ asset('images/serko-logo.svg') }}" type="image/svg+xml">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=sora:400,500,600,700,800" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@6.0.0-beta.2/dist/dropzone.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css">
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen antialiased">
        <div class="mx-auto flex min-h-screen max-w-7xl flex-col px-4 py-6 md:px-8">
            <header class="serko-card serko-reveal mb-8 px-5 py-4 md:px-6">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <a href="{{ route('home') }}" class="group flex items-center gap-3">
                        <img src="{{ asset('images/serko-logo.svg') }}" alt="SERKO" class="h-14 w-14 rounded-2xl shadow-xl shadow-red-950/20 transition group-hover:-rotate-3 group-hover:scale-105">
                        <span>
                            <span class="block text-3xl font-black tracking-[0.2em] text-slate-950">SERKO</span>
                            <span class="block text-sm text-slate-600">{{ __('serko.brand_tagline') }}</span>
                        </span>
                    </a>
                    <nav class="flex flex-wrap items-center gap-2 text-sm font-semibold text-slate-700">
                        <a href="{{ route('events.index') }}" class="serko-nav-link {{ request()->routeIs('events.*') ? 'bg-slate-950 text-white' : '' }}">{{ __('serko.nav.events') }}</a>
                        <a href="{{ route('stadiums.index') }}" class="serko-nav-link {{ request()->routeIs('stadiums.*') ? 'bg-slate-950 text-white' : '' }}">{{ __('serko.nav.stadiums') }}</a>
                        @auth
                            <a href="{{ route('dashboard') }}" class="serko-nav-link {{ request()->routeIs('dashboard') ? 'bg-slate-950 text-white' : '' }}">{{ __('serko.nav.dashboard') }}</a>
                            <a href="{{ route('orders.index') }}" class="serko-nav-link {{ request()->routeIs('orders.*') ? 'bg-slate-950 text-white' : '' }}">{{ __('serko.nav.orders') }}</a>
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('admin.events.index') }}" class="serko-nav-link {{ request()->routeIs('admin.events.*') || request()->routeIs('admin.stadiums.*') ? 'bg-slate-950 text-white' : '' }}">{{ __('serko.nav.admin') }}</a>
                                <a href="{{ route('admin.reports.index') }}" class="serko-nav-link {{ request()->routeIs('admin.reports.*') ? 'bg-slate-950 text-white' : '' }}">{{ __('serko.nav.reports') }}</a>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="serko-nav-link">{{ __('serko.nav.logout') }}</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="serko-nav-link">{{ __('serko.nav.login') }}</a>
                            <a href="{{ route('register') }}" class="serko-button px-4 py-2">{{ __('serko.nav.register') }}</a>
                        @endauth
                        <span class="mx-1 hidden h-6 w-px bg-slate-200 md:block"></span>
                        @foreach (['es' => 'ES', 'en' => 'EN', 'ca' => 'CA', 'fr' => 'FR', 'de' => 'DE'] as $locale => $label)
                            <a href="{{ route('locale.switch', $locale) }}" class="serko-nav-link {{ app()->getLocale() === $locale ? 'bg-amber-100 text-amber-800' : '' }}">{{ $label }}</a>
                        @endforeach
                    </nav>
                </div>
            </header>

            @if (session('status'))
                <x-alert type="success" class="mb-6">
                    {{ session('status') }}
                </x-alert>
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
