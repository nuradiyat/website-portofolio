<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    @include('partials.meta')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="bg-white text-gray-900 antialiased selection:bg-blue-600 selection:text-white">

    <x-navbar />

    <main class="min-h-screen">

        @yield('content')

    </main>
    
    <x-footer />

    @include('partials.scripts')
    @stack('scripts')
</body>
</html>
