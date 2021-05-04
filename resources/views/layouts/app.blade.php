<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? '' }} - {{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/fa.css') }}" rel=" stylesheet">

        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

        {{ $head ?? '' }}

        <style>
            {{ $styles ?? '' }}
        </style>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        {{ $scripts ?? '' }}

    </head>
    <body class="flex flex-col md:flex-row font-sans antialiased text-white min-h-screen">
        <div>
            @include('layouts.navigation')
        </div>
        <div class="bg-truegray-100 flex-grow">
            <!-- Page Content -->
            <main class="flex-grow text-black md:pl-72 pt-12 md:pt-0">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
