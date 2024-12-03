<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">

        <nav class="bg-white border-b border-teal-200 p-4  drop-shadow-lg">
            <div class="flex flew-warp justify-end items-center mx-auto max-w-screen-xl gap-6">
                <p>{{ now()->format('l, d M Y | H:1') }}</p>
                <i class="fa-regular fa-calendar"></i>
                <button id="theme-toggle">
                    <i id="theme-toggle-icon" class="fas fa-sun"></i>
                </button>
            </div>
        </nav>

        <div class="min-h-[100dvh] lg:min-h-[92dvh] flex flex-col lg:flex-row justify-center items-center lg:pt-6 sm:pt-0 bg-gray-100 lg:gap-20 px-10">

            <div class="rounded-sm drop-shadow-md hidden lg:block">
                <a href="/"><img src="/assets/hero-library.png" alt="" width="550"></a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg space-y-5 border border-l-4 border-l-teal-600">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
