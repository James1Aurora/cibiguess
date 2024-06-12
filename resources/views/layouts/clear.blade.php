<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Untitled')</title>
    <!-- Include CSS files -->
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/icon-cibiguess.svg') }}" />
    @vite('resources/css/app.css')
    <!-- Include additional CSS if needed -->
    @yield('styles')
</head>

<body @yield('body-class')>
    @yield('content')

    <!-- Include additional JS if needed -->
    @yield('scripts')
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
</body>

</html>
