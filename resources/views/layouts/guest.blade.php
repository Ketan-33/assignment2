<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Our Articles @if(isset($title)) {{ ' | '.$title}} @endif</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans bg-gray-100">
        <div class="container mx-auto p-8">
            <!-- Header -->
            @if (isset($header))
            <div class="text-4xl font-bold mb-8 text-center">
                <a href="/">{{ $header }}</a>
            </div>
             @endif
            {{ $slot }}
            <footer class="bg-gray-700 text-white p-4">
    <!-- Your footer content goes here -->
    <p>this is footer</p>
</footer>

        </div>
    </body>
</html>
