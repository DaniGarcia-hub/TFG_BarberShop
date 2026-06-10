<nav x-data="{ open: false }" class="bg-[#101111] border-b border-[#413B36] shadow-[0_4px_20px_-5px_rgba(0,0,0,0.3)] sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}" class="flex items-center gap-3 no-underline group">
                        <figure class="flex items-center">
                            <img id="logoNav" src="{{ asset('img/LogoNav.png') }}" alt="Logo de BarberShop" class="h-14 w-auto object-contain brightness-110">
                        </figure>
                        <p class="text-[#E5E5E5] font-girassol text-2xl tracking-wider uppercase transition-colors duration-200 group-hover:text-[#D1C7B7]">
                            Barber Shop
                        </p>
                    </a>
                </div>

                <div class="hidden space-x-6 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Inicio') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-1.5 border border-[#927860] text-[1.1rem] font-bebas uppercase tracking-wider rounded-[0.4rem] text-[#413B36] bg-[#D1C7B7] hover:bg-[#EBE6E1] hover:text-[#413B36] focus:outline-none transition ease-in-out duration-150 shadow-md cursor-pointer">
                            <div class="font-bold">{{ Auth::user()->name }}</div>
                            <div class="ms-2 text-[#413B36]/70">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Mi Perfil') }}
                        </x-dropdown-link>
                        @hasanyrole('admin|peluquero')
                        <x-dropdown-link :href="route('admin.inicio')">
                            {{ __('Gestionar Peluquería') }}
                        </x-dropdown-link>
                        @endhasanyrole

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    class="!text-rose-400 hover:!bg-rose-950/40"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-lg text-[#D1C7B7] bg-[#413B36]/40 hover:text-[#E5E5E5] hover:bg-[#413B36] focus:outline-none transition duration-150 ease-in-out border border-[#413B36]">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-[#413B36] bg-[#101111]">
        <div class="pt-2 pb-3 space-y-1 px-3">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                class="rounded-md font-bebas text-[1.3rem] tracking-wider uppercase block px-3 py-2 no-underline {{ request()->routeIs('dashboard') ? 'bg-[#927860] text-white' : 'text-[#E5E5E5]/80 hover:text-[#E5E5E5] hover:bg-[#413B36]' }}">
                {{ __('Inicio') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-3 border-t border-[#413B36] px-3">
            <div class="px-4 py-2.5 bg-[#413B36]/30 rounded-lg border border-[#413B36] mb-3 shadow-inner">
                <div class="font-bebas text-[1.2rem] tracking-wider uppercase text-[#D1C7B7]">{{ Auth::user()->name }}</div>
                <div class="font-poppins text-xs text-[#E5E5E5]/60 mt-0.5">{{ Auth::user()->email }}</div>
            </div>

            <div class="space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="rounded-md font-bebas text-[1.2rem] tracking-wider uppercase text-[#E5E5E5] hover:bg-[#413B36] block px-3 py-2 no-underline">
                    {{ __('Mi Perfil') }}
                </x-responsive-nav-link>
                @hasanyrole('admin|peluquero')
                <x-responsive-nav-link :href="route('admin.inicio')" class="rounded-md font-bebas text-[1.2rem] tracking-wider uppercase text-[#E5E5E5] hover:bg-[#413B36] block px-3 py-2 no-underline">
                    {{ __('Gestionar Peluquería') }}
                </x-responsive-nav-link>
                @endhasanyrole

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            class="rounded-md font-bebas text-[1.2rem] tracking-wider uppercase text-rose-400 hover:bg-rose-950/40 block px-3 py-2 no-underline"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Cerrar Sesión') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>