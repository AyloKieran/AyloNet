<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- PWA Assets -->

        <link rel="apple-touch-icon" sizes="180x180" href="/pwaAssets/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/pwaAssets/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/pwaAssets/favicon-16x16.png">
        <link rel="manifest" href="/pwaAssets/site.webmanifest">
        <link rel="mask-icon" href="/pwaAssets/safari-pinned-tab.svg" color="#3b4abc">
        <link rel="shortcut icon" href="/pwaAssets/favicon.ico">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="msapplication-config" content="/pwaAssets/browserconfig.xml">
        <meta name="theme-color" content="#ffffff">

        <title>{{ $title ?? '' }} - {{ config('app.name', 'ayloNet') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/fa.css') }}" rel=" stylesheet">

        <link rel="icon" type="image/png" href="{{ asset('pwaAssets/favicon-32x32.png') }}">

        {{ $head ?? '' }}

        <style>
            {{ $styles ?? '' }}
        </style>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        {{ $scripts ?? '' }}
        
    </head>
    <body>
        <main class="font-sans text-gray-900 antialiased font-sans antialiased">
            {{ $slot }}
        </main>
    </body>
</html>
