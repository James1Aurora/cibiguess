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
    @vite('resources/css/app.css')
    <!-- Include additional CSS if needed -->
    @yield('styles')
</head>

<body>
    @include('layouts.partials.sidebar')
    @include('layouts.partials.bottombar')

    <!-- Main content -->
    <section class="group" id="sideContent">
        <div
            class="relative min-h-screen left-0 w-full transition-all duration-500 ease-in-out z-0 top-0 p-4 sm:group-[.open]:w-[calc(100%_-_250px)] sm:group-[.open]:left-[250px] sm:left-[78px] sm:w-[calc(100%_-_78px)]">
            @yield('content')

            <!-- MARGIN FOR BOTTOM NAVIGATION -->
            <div class="h-10 w-full sm:hidden"></div>
        </div>
    </section>

    <!-- Include JS files -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <!-- Include additional JS if needed -->
    @yield('scripts')
</body>

</html>
