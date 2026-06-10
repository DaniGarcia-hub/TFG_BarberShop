<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>BarberShop</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-[#f8f6f4]">
        
        <section class="min-h-screen w-full flex items-center justify-center p-4 sm:p-6 bg-[#f8f6f4]">
            <div class="w-full max-w-[420px]">
                
                <div class="relative bg-white rounded-2xl pt-10 px-6 pb-8 md:px-8 shadow-[0_4px_20px_-1px_rgba(0,0,0,0.05),0_2px_4px_-1px_rgba(0,0,0,0.03)] border border-[#f1f5f9]">
                    <div class="absolute top-5 left-5">
                        <a href="{{ route('home') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-[#64748b] hover:text-[#927860] transition-colors duration-200 group no-underline">
                            <svg class="transform group-hover:-translate-x-0.5 transition-transform duration-200" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="19" y1="12" x2="5" y2="12"></line>
                                <polyline points="12 19 5 12 12 5"></polyline>
                            </svg>
                            Volver
                        </a>
                    </div>
                    <div class="text-center mb-8">
                        <div class="mb-4 flex justify-center">
                            <svg width="40" height="40" viewBox="0 0 36 36" fill="none">
                                <rect width="36" height="36" rx="8" fill="#927860" />
                                <path d="M12 14h12v8H12v-8zm2 2v4h8v-4h-8zm-2-4h12v2H12v-2zm0 12h12v2H12v-2z" fill="white" />
                            </svg>
                        </div>
                        <h1 class="text-[#1e293b] text-2xl md:text-[1.75rem] font-bold mb-1.5 tracking-tight">Barber Shop</h1>
                        <p class="text-[#64748b] text-sm font-medium">¡Tus mejores peluqueros!</p>
                    </div>

                    {{ $slot }}
                    
                </div>
            </div>
        </section>

    </body>
</html>