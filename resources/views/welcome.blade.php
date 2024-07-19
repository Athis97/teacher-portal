<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('build/assets/app-D8pihQrE.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('build/assets/app-Cs0QkU1O.js') }}"></script>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50 min-w-full min-h-screen">
    <div class="bg-gray-200 text-black/50 dark:bg-black dark:text-white/50">
        <div class="relative min-h-screen flex flex-col selection:bg-[#FF2D20] selection:text-white">
            <header class="absolute top-0 right-0 w-full flex justify-end pt-3 pr-4">
                @if (Route::has('login'))
                    <nav class="flex gap-3">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Log in
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </header>
            <div class="min-h-screen flex-grow flex items-center justify-center">
                <main class="text-center">
                    <div>
                        <x-application-logo />
                    </div>
                </main>
            </div>
        </div>
    </div>
</body>

</html>
