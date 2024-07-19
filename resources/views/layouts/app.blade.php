<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('logo.png') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="stylesheet" href="{{ asset('build/assets/app-D8pihQrE.css') }}">
    <!-- Scripts -->
    <script type="module" src="{{ asset('build/assets/app-Cs0QkU1O.js') }}"></script>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-200">
        @include('layouts.navigation')

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>
