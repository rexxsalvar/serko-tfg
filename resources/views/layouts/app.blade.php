<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>
        <link rel="icon" href="{{ asset('images/serko-logo.svg') }}" type="image/svg+xml">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&family=Sora:wght@400;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@6.0.0-beta.2/dist/dropzone.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css">
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen antialiased">
        <div class="bg-noise"></div>

        <header id="navbar" class="fixed left-0 top-0 z-40 w-full border-b border-white/10 bg-[#0b0f19]/90 backdrop-blur-xl">
            <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-4 md:px-8">
                <a href="{{ route('home') }}" class="group flex items-center gap-3">
                    <img src="{{ asset('images/serko-logo.svg') }}" alt="SERKO" class="h-11 w-11 rounded-2xl bg-red-600 p-1 shadow-lg shadow-red-950/40 transition group-hover:rotate-6 group-hover:scale-105">
                    <span>
                        <span class="font-display block text-2xl font-black tracking-tight text-white">SERKO</span>
                        <span class="hidden text-xs text-gray-400 sm:block">{{ __('serko.brand_tagline') }}</span>
                    </span>
                </a>

                <nav class="hidden items-center gap-2 md:flex">
                    <a href="{{ route('home') }}" class="serko-nav-link {{ request()->routeIs('home') ? 'bg-white/10 text-[#fcbf49]' : '' }}">{{ __('serko.nav.home') }}</a>
                    <a href="{{ route('events.index') }}" class="serko-nav-link {{ request()->routeIs('events.*') ? 'bg-white/10 text-[#fcbf49]' : '' }}">{{ __('serko.nav.events') }}</a>
                    <a href="{{ route('stadiums.index') }}" class="serko-nav-link {{ request()->routeIs('stadiums.*') ? 'bg-white/10 text-[#fcbf49]' : '' }}">{{ __('serko.nav.stadiums') }}</a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="serko-nav-link {{ request()->routeIs('dashboard') ? 'bg-white/10 text-[#fcbf49]' : '' }}">{{ __('serko.nav.dashboard') }}</a>
                        <a href="{{ route('orders.index') }}" class="serko-nav-link {{ request()->routeIs('orders.*') ? 'bg-white/10 text-[#fcbf49]' : '' }}">{{ __('serko.nav.orders') }}</a>
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.index') }}" class="serko-nav-link {{ request()->routeIs('admin.*') ? 'bg-[#fcbf49] text-black hover:text-black' : '' }}">{{ __('serko.nav.admin') }}</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="serko-nav-link hover:text-red-300">{{ __('serko.nav.logout') }}</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="serko-nav-link">{{ __('serko.nav.login') }}</a>
                        <a href="{{ route('register') }}" class="serko-button px-4 py-2">{{ __('serko.nav.register') }}</a>
                    @endauth
                    <span class="mx-2 h-6 w-px bg-white/10"></span>
                    @foreach (['es' => 'ES', 'en' => 'EN'] as $locale => $label)
                        <a href="{{ route('locale.switch', $locale) }}" class="rounded-lg px-2 py-1 text-xs font-black transition {{ app()->getLocale() === $locale ? 'bg-[#fcbf49] text-black' : 'bg-white/5 text-gray-400 hover:text-white' }}">{{ $label }}</a>
                    @endforeach
                </nav>

                <button type="button" data-mobile-menu-toggle class="rounded-xl border border-white/10 p-2 text-white md:hidden" aria-label="Abrir menu">
                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>

            <div data-mobile-menu class="hidden border-t border-white/10 bg-[#151b2b] md:hidden">
                <div class="mx-auto flex max-w-7xl flex-col gap-2 px-4 py-4">
                    <a href="{{ route('home') }}" class="serko-nav-link">{{ __('serko.nav.home') }}</a>
                    <a href="{{ route('events.index') }}" class="serko-nav-link">{{ __('serko.nav.events') }}</a>
                    <a href="{{ route('stadiums.index') }}" class="serko-nav-link">{{ __('serko.nav.stadiums') }}</a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="serko-nav-link">{{ __('serko.nav.dashboard') }}</a>
                        <a href="{{ route('orders.index') }}" class="serko-nav-link">{{ __('serko.nav.orders') }}</a>
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.index') }}" class="serko-nav-link">{{ __('serko.nav.admin') }}</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="serko-nav-link text-left">{{ __('serko.nav.logout') }}</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="serko-nav-link">{{ __('serko.nav.login') }}</a>
                        <a href="{{ route('register') }}" class="serko-button text-center">{{ __('serko.nav.register') }}</a>
                    @endauth
                    <div class="mt-2 flex flex-wrap gap-2">
                        @foreach (['es' => 'ES', 'en' => 'EN'] as $locale => $label)
                            <a href="{{ route('locale.switch', $locale) }}" class="rounded-lg px-3 py-2 text-xs font-black transition {{ app()->getLocale() === $locale ? 'bg-[#fcbf49] text-black' : 'bg-white/5 text-gray-400' }}">{{ $label }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </header>

        <div class="relative z-10 flex min-h-screen flex-col pt-20">
            @if (session('status'))
                <div data-toast-message="{{ session('status') }}"></div>
            @endif

            <main class="mx-auto w-full max-w-7xl flex-1 px-4 py-8 md:px-8">
                @yield('content')
            </main>

            <footer class="mt-auto border-t border-white/10 bg-[#0b0f19]/95 py-12">
                <div class="mx-auto grid max-w-7xl gap-8 px-4 md:grid-cols-4 md:px-8">
                    <div>
                        <span class="font-display mb-4 block text-2xl font-black text-white">SERKO</span>
                        <p class="text-sm leading-6 text-gray-400">{{ __('serko.brand_tagline') }}</p>
                    </div>
                    <div>
                        <h4 class="mb-4 font-bold text-white">{{ __('serko.nav.events') }}</h4>
                        <div class="space-y-2 text-sm text-gray-400">
                            <a href="{{ route('events.index') }}" class="block hover:text-[#fcbf49]">{{ __('serko.hero.cta_primary') }}</a>
                            <a href="{{ route('stadiums.index') }}" class="block hover:text-[#fcbf49]">{{ __('serko.hero.cta_secondary') }}</a>
                        </div>
                    </div>
                    <div>
                        <h4 class="mb-4 font-bold text-white">SERKO</h4>
                        <div class="space-y-2 text-sm text-gray-400">
                            <a href="{{ route('login') }}" class="block hover:text-[#fcbf49]">{{ __('serko.nav.login') }}</a>
                            <a href="{{ route('register') }}" class="block hover:text-[#fcbf49]">{{ __('serko.nav.register') }}</a>
                        </div>
                    </div>
                    <div>
                        <h4 class="mb-4 font-bold text-white">Idioma</h4>
                        <div class="flex flex-wrap gap-2">
                            @foreach (['es' => 'ES', 'en' => 'EN'] as $locale => $label)
                                <a href="{{ route('locale.switch', $locale) }}" class="rounded-lg border border-white/10 px-3 py-2 text-xs font-black {{ app()->getLocale() === $locale ? 'bg-[#fcbf49] text-black' : 'text-gray-400 hover:text-white' }}">{{ $label }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="mx-auto mt-10 max-w-7xl border-t border-white/5 px-4 pt-8 text-center text-sm text-gray-600 md:px-8">
                    &copy; {{ now()->year }} SERKO. Todos los derechos reservados.
                </div>
            </footer>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/dropzone@6.0.0-beta.2/dist/dropzone-min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.min.js"></script>
        @livewireScripts
        @stack('scripts')
    </body>
</html>
