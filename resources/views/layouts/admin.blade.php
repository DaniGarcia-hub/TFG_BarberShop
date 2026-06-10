<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Panel Admin - Barber Shop</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Girassol&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.3.8/css/dataTables.dataTables.min.css" rel="stylesheet" integrity="sha384-iRTWPXZquQySBE9K96fgJXUIrnm8TpdtPAbiCNR+qjpP24qFZw9PHFA91JtWy7Ul" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/responsive/3.0.8/css/responsive.dataTables.min.css" rel="stylesheet" integrity="sha384-kz9bozrCHP/y+wTJV8P+n/dMBOh00rqNmmIAgHckzFWpoSB49V5ornW1aY+uYTyA" crossorigin="anonymous">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-poppins bg-[#262929] text-[#E5E5E5] antialiased">
    <div x-data="{ sidebarOpen: false }" class="flex min-h-screen overflow-hidden">
        @include('layouts.partials.admin.sidebar')
        <div class="flex-1 flex flex-col min-w-0">
            @include('layouts.partials.admin.header')
            <div class="flex-1 p-[1.5rem] md:p-[2.5rem] overflow-y-auto">
                @yield('content')
            </div>
            @include('layouts.partials.admin.footer')
        </div>
    </div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha384-NXgwF8Kv9SSAr+jemKKcbvQsz+teULH/a5UNJvZc6kP47hZgl62M1vGnw6gHQhb1" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.3.8/js/dataTables.min.js" integrity="sha384-vKSHfmUIK/B5LfOmzrP+424efQhNcgZm+sqxgq/DNCicqQRp/V6pVc4HCaRzeQZw" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/responsive/3.0.8/js/dataTables.responsive.min.js" integrity="sha384-jp1JS4vMvRmld4ZK9Co4AZftrm1tt3FbEZrCdFZIcoRiazQGkTqOS1QqI060oG2F" crossorigin="anonymous"></script>

@yield('scripts')  
