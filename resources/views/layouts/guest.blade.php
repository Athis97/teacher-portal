<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" type="image/x-icon" href="{{ asset('logo.png') }}">
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('build/assets/app-D8pihQrE.css') }}">
        <!-- Scripts -->
        <script src="{{ asset('build/assets/app-Cs0QkU1O.js') }}"></script>
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-200">
            <div>
                <a href="/">
                    <x-application-logo class="w-52 mb-5 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-16 py-10 bg-white shadow-md overflow-hidden sm:rounded-sm">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
