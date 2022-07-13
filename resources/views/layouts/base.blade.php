<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @hasSection('title')
        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @livewireStyles
    <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">
    <!-- Scripts -->
    @livewireScripts
    <script src="{{ url(mix('js/app.js')) }}" defer></script>
    @stack('scripts')
</head>

<body>
    @include('partials.navbar')
    @yield('body')
</body>

</html>
