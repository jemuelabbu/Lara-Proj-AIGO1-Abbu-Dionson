<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ ($appearance ?? 'system') === 'dark' ? 'dark' : '' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <script>
            (function () {
                const cookie = document.cookie.match(/(?:^|; )appearance=([^;]*)/);
                const stored = cookie ? decodeURIComponent(cookie[1]) : localStorage.getItem('appearance');
                const appearance = stored === 'dark' || stored === 'light'
                    ? stored
                    : (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');

                document.documentElement.classList.toggle('dark', appearance === 'dark');
                document.documentElement.style.colorScheme = appearance;
            })();
        </script>

        <title>@hasSection('title')@yield('title') - {{ config('app.name', 'Laravel') }}@else{{ config('app.name', 'Laravel') }}@endif</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @stack('styles')
    </head>
    <body class="min-h-screen bg-background text-foreground">
        <div class="flex min-h-screen flex-col">
            <header class="sticky top-0 z-40 border-b bg-card/85 backdrop-blur supports-[backdrop-filter]:bg-card/70">
                <div class="mx-auto flex h-16 w-full max-w-6xl items-center gap-3 px-4 sm:px-6">
                    <a href="{{ route('home') }}" class="flex shrink-0 items-center gap-2" aria-label="{{ config('app.name', 'Laravel') }} home">
                        {{-- Light mode logo (hidden in dark mode) --}}
                        <img src="{{ asset('images/lightmode_logo.png') }}" alt="Git Brew logo" class="size-30 rounded-md object-contain dark:hidden">
                        {{-- Dark mode logo (hidden in light mode) --}}
                        <img src="{{ asset('images/darkmode_logo.png') }}" alt="Git Brew logo" class="hidden size-30 rounded-md object-contain dark:block">
                    </a>

                    <nav class="ml-auto flex items-center gap-1" aria-label="Main navigation">
                        <a href="{{ route('home') }}" @class([
                            'rounded-md px-2 py-2 text-[10px] font-semibold tracking-wider uppercase transition-colors sm:px-3 sm:text-xs',
                            'bg-accent text-accent-foreground' => request()->routeIs('home'),
                            'text-muted-foreground hover:bg-muted hover:text-foreground' => ! request()->routeIs('home'),
                        ])>Home</a>
                        <a href="{{ route('about') }}" @class([
                            'rounded-md px-2 py-2 text-[10px] font-semibold tracking-wider uppercase transition-colors sm:px-3 sm:text-xs',
                            'bg-accent text-accent-foreground' => request()->routeIs('about'),
                            'text-muted-foreground hover:bg-muted hover:text-foreground' => ! request()->routeIs('about'),
                        ])>About</a>
                        <a href="{{ route('contact') }}" @class([
                            'rounded-md px-2 py-2 text-[10px] font-semibold tracking-wider uppercase transition-colors sm:px-3 sm:text-xs',
                            'bg-accent text-accent-foreground' => request()->routeIs('contact', 'contacts'),
                            'text-muted-foreground hover:bg-muted hover:text-foreground' => ! request()->routeIs('contact', 'contacts'),
                        ])>Contacts</a>
                    </nav>

                    <button type="button" class="btn btn-ghost btn-icon shrink-0" data-theme-toggle title="Switch to dark mode" aria-label="Toggle dark mode" aria-pressed="false">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-5 dark:hidden">
                            <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="hidden size-5 dark:block">
                            <circle cx="12" cy="12" r="4" />
                            <path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41" />
                        </svg>
                    </button>
                </div>
            </header>

            <main class="flex flex-1 flex-col">
                @yield('content')
            </main>

            <footer class="border-t bg-card/60">
                <div class="mx-auto flex w-full max-w-6xl flex-col gap-4 px-4 py-8 sm:flex-row sm:items-center sm:justify-between sm:px-6">
                    <div class="space-y-1">
                        <p class="text-sm text-muted-foreground">
                            &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
                        </p>
                        <p class="text-sm text-muted-foreground">
                            Group members: <span class="font-medium text-foreground">Jemuel Abbu</span> &amp; <span class="font-medium text-foreground">Ralph Dionson</span>
                        </p>
                    </div>
                    <nav class="flex items-center gap-4 text-sm text-muted-foreground" aria-label="Footer navigation">
                        <a href="{{ route('home') }}" class="transition-colors hover:text-foreground">Home</a>
                        <a href="{{ route('about') }}" class="transition-colors hover:text-foreground">About</a>
                        <a href="{{ route('contact') }}" class="transition-colors hover:text-foreground">Contacts</a>
                    </nav>
                </div>
            </footer>
        </div>

        @include('partials.toasts')

        @stack('scripts')
    </body>
</html>
