<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="httpzs://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Styles -->
    @livewireStyles
</head>

<body class="flex flex-col min-h-screen font-sans antialiased">
    <div class="flex-grow">
        @include('layouts.partials.header')

        @yield('hero')
    </div>

    <main class="container flex-grow flex-shrink-0 px-5 mx-auto">
        {{ $slot }}
    </main>

    @include('layouts.partials.footer')

    @stack('modals')
    @stack('script')
    @stack('num-formatter-script')
    @livewireScripts
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
</body>

</html>
