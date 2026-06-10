<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Panel Barbería') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-poppins antialiased bg-[#262929] text-[#E5E5E5]">
        <div class="min-h-screen">
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-[#101111] border-b border-[#413B36] shadow-[0_2px_10px_rgba(0,0,0,0.2)]">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-[#E5E5E5]">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main>
                {{ $slot }}
            </main>
        </div>
    </body
</html>