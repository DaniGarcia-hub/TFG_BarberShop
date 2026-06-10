<aside 
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 z-50 w-[18rem] bg-[#101111] border-r border-[#413B36] flex flex-col justify-between shrink-0 transition-transform duration-300 ease-in-out lg:static lg:translate-x-0 lg:flex"
    x-data="{ openRecursos: {{ request()->routeIs('admin.schedules.*') || request()->routeIs('admin.haircuts.*') ? 'true' : 'false' }} }">
    
    <div>
        <div class="p-[2rem] border-b border-[rgba(146,120,96,0.3)] flex justify-between items-start items-center">
            <div class="w-full">
                <p class="font-girassol text-[2rem] uppercase tracking-wider text-[#D1C7B7] text-center">
                    Barber Shop
                </p>
                <p class="font-bebas text-[0.9rem] text-center tracking-widest text-[#927860] mt-[-0.3rem]">
                    PANEL DE ADMINISTRACIÓN
                </p>
            </div>
            <button @click="sidebarOpen = false" class="text-[#D1C7B7] hover:text-[#E5E5E5] lg:hidden cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>

        <nav class="flex flex-col gap-[0.5rem] p-[1rem] mt-[1rem]">
            
            <a href="{{ route('admin.inicio') }}" class="flex items-center gap-[0.8rem] text-[#E5E5E5] py-[0.8rem] px-[1rem] rounded-[6px] no-underline transition-colors {{ request()->routeIs('admin.inicio') ? 'text-[#E5E5E5] bg-[rgba(146,120,96,0.15)] border-l-4 border-[#D1C7B7] font-semibold' : 'text-[#D1C7B7] hover:text-[#E5E5E5] hover:bg-[rgba(255,255,255,0.05)]' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="9" rx="1"/><rect x="14" y="3" width="7" height="5" rx="1"/><rect x="14" y="12" width="7" height="9" rx="1"/><rect x="3" y="16" width="7" height="5" rx="1"/></svg>
                Inicio
            </a>

            @role('admin')
            <a href="{{ route('admin.users.index') }}" class="flex items-center gap-[0.8rem] py-[0.8rem] px-[1rem] rounded-[6px] no-underline transition-colors {{ request()->routeIs('admin.users.index') ? 'text-[#E5E5E5] bg-[rgba(146,120,96,0.15)] border-l-4 border-[#D1C7B7] font-semibold' : 'text-[#D1C7B7] hover:text-[#E5E5E5] hover:bg-[rgba(255,255,255,0.05)]' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                Usuarios
            </a>
            @endrole

            <a href="{{ route('admin.bookings.index') }}" class="flex items-center gap-[0.8rem] py-[0.8rem] px-[1rem] rounded-[6px] no-underline transition-colors {{ request()->routeIs('admin.bookings.index') ? 'text-[#E5E5E5] bg-[rgba(146,120,96,0.15)] border-l-4 border-[#D1C7B7] font-semibold' : 'text-[#D1C7B7] hover:text-[#E5E5E5] hover:bg-[rgba(255,255,255,0.05)]' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                Reservas
            </a>

            <div class="flex flex-col">
                <button @click="openRecursos = !openRecursos" 
                    class="w-full flex items-center justify-between text-[#D1C7B7] hover:text-[#E5E5E5] hover:bg-[rgba(255,255,255,0.05)] py-[0.8rem] px-[1rem] rounded-[6px] transition-colors cursor-pointer {{ request()->routeIs('admin.schedules.*') || request()->routeIs('admin.haircuts.*') ? 'text-[#E5E5E5] bg-[rgba(255,255,255,0.02)] font-medium' : '' }}">
                    <div class="flex items-center gap-[0.8rem]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        <span>Recursos</span>
                    </div>
                    <svg :class="openRecursos ? 'rotate-180' : ''" class="transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </button>

                <div x-show="openRecursos" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 transform -translate-y-2"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     x-transition:leave="transition ease-in duration-100"
                     class="flex flex-col gap-[0.3rem] pl-[1.5rem] mt-[0.3rem] border-l border-[rgba(146,120,96,0.2)] ml-[1.5rem]">
                    
                    <a href="{{ route('admin.schedules.index') }}" class="flex items-center gap-[0.8rem] py-[0.6rem] px-[1rem] rounded-[4px] no-underline transition-colors text-[0.95rem] {{ request()->routeIs('admin.schedules.index') ? 'text-[#E5E5E5] bg-[rgba(146,120,96,0.15)] font-semibold' : 'text-[#D1C7B7]/80 hover:text-[#E5E5E5] hover:bg-[rgba(255,255,255,0.03)]' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        Horarios
                    </a>

                    <a href="{{ route('admin.haircuts.index') }}" class="flex items-center gap-[0.8rem] py-[0.6rem] px-[1rem] rounded-[4px] no-underline transition-colors text-[0.95rem] {{ request()->routeIs('admin.haircuts.index') ? 'text-[#E5E5E5] bg-[rgba(146,120,96,0.15)] font-semibold' : 'text-[#D1C7B7]/80 hover:text-[#E5E5E5] hover:bg-[rgba(255,255,255,0.03)]' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="16" height="16"><path fill="currentColor" d="M256 320L216.5 359.5C203.9 354.6 190.3 352 176 352C114.1 352 64 402.1 64 464C64 525.9 114.1 576 176 576C237.9 576 288 525.9 288 464C288 449.7 285.3 436.1 280.5 423.5L563.2 140.8C570.3 133.7 570.3 122.3 563.2 115.2C534.9 86.9 489.1 86.9 460.8 115.2L320 256L280.5 216.5C285.4 203.9 288 190.3 288 176C288 114.1 237.9 64 176 64C114.1 64 64 114.1 64 176C64 237.9 114.1 288 176 288C190.3 288 203.9 285.3 216.5 280.5L256 320zM353.9 417.9L460.8 524.8C489.1 553.1 534.9 553.1 563.2 524.8C570.3 517.7 570.3 506.3 563.2 499.2L417.9 353.9L353.9 417.9zM128 176C128 149.5 149.5 128 176 128C202.5 128 224 149.5 224 176C224 202.5 202.5 224 176 224C149.5 224 128 202.5 128 176zM176 416C202.5 416 224 437.5 224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464C128 437.5 149.5 416 176 416z"/></svg>
                        Cortes
                    </a>
                </div>
            </div>

        </nav>
    </div>

    <div class="p-[1rem] border-t border-[rgba(65,59,54,0.4)]">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center gap-[0.5rem] bg-[#413B36] hover:bg-rose-900 text-[#E5E5E5] font-bebas text-[1.2rem] uppercase py-[0.4rem] rounded-[4px] transition-colors cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                <span class="md:hidden lg:inline">Cerrar Sesión</span>
            </button>
        </form>
    </div>
</aside>

<div 
    v-show="sidebarOpen" 
    @click="sidebarOpen = false" 
    class="fixed inset-0 z-40 bg-black/50 lg:hidden"
    style="display: none;"
    x-show="sidebarOpen">
</div>