<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Page Title')</title>

        @vite('resources/css/app.css')
        <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.js"></script>
        <!-- Add Alpine.js -->
        <script defer src="https://unpkg.com/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @include('sweetalert::alert')
        @livewireStyles
        @include('includes.header')
    </head>
    <body class="dark:bg-boxdark-2 dark:text-bodydark">
        <div class="flex h-screen overflow-hidden">
            @include('includes.navbar-admin')
            <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
                @yield('content')
            </div>
        </div>
        @livewireScripts
    </body>
</html>
