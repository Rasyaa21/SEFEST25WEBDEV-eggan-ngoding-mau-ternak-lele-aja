<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Page Title')</title>

        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body>
        @include('includes.navbar')
        <div class="my-auto lg:mt-4 md:mt-4 sm:mt-16">
            @yield('content')
        </div>
        @livewireScripts
    </body>
</html>