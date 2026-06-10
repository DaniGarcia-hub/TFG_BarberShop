<header class="h-[4.5rem] bg-[#101111] border-b border-[#413B36] flex items-center justify-between px-[1.5rem] md:px-[2rem] shrink-0">
    
    <div class="flex items-center gap-[0.75rem]">
        <button @click="sidebarOpen = true" class="text-[#D1C7B7] hover:text-[#E5E5E5] lg:hidden p-[0.25rem] cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
        </button>

        <div class="flex items-center gap-[0.5rem]">
            <span class="text-[#927860] uppercase font-bebas tracking-widest text-[1rem] md:text-[1.1rem]">Zona Administrativa</span>
        </div>
    </div>

    <div class="flex items-center gap-[1rem] md:gap-[2rem]">
        <a href="{{ url('/') }}" class="text-[#D1C7B7] hover:text-[#E5E5E5] no-underline font-bebas text-[1.1rem] uppercase tracking-wider flex items-center gap-[0.4rem] transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            <span class="hidden sm:inline">Ver Sitio Web</span>
        </a>

        <div class="flex items-center gap-[0.5rem] md:gap-[0.8rem] border-l border-[#413B36] pl-[1rem] md:pl-[2rem]">
            <div class="text-right hidden md:block">
                <a href="{{ route('dashboard') }}" class="text-[#E5E5E5] text-[0.85rem] hover:text-[#D1C7B7] font-semibold leading-tight">{{ Auth::user()->name ?? 'Administrador' }}</a>
                <p class="text-[#927860] text-[0.75rem] font-medium mt-[0.1rem] uppercase">{{ Auth::user()->getRoleNames()->first() ?? 'Admin' }}</p>
            </div>
            <a href="{{ route('dashboard') }}" class="w-[2.2rem] h-[2.2rem] md:w-[2.5rem] md:h-[2.5rem] rounded-full bg-[#927860] flex items-center justify-center font-bebas text-[1.2rem] md:text-[1.4rem] text-white select-none">
                {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
            </a>
        </div>
    </div>
</header>