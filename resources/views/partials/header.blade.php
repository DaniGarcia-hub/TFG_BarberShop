<header id="cabeceraWeb" class="w-full bg-[#080403] border-t-[0.6rem] border-[#40362B] px-6 lg:px-[12vw] py-4 flex items-center justify-between relative">
        
        <div class="flex items-center gap-[2rem] lg:gap-[5rem]">
            <figure class="flex items-center">
                <a href="index.php">
                    <img id="logoNav" src="{{ asset('img/LogoNav.png') }}" alt="Logo de BarberShop" class="h-14 w-auto object-contain">
                </a>
            </figure>
        
            <nav id="navHeader" class="hidden lg:flex items-center gap-4">
                <a href="index.php" class="text-[#E5E5E5] hover:text-[#d1c7b7] transition-colors duration-200 font-bebas text-[1.5rem] uppercase border-b-2 border-white pb-1 no-underline">Inicio</a>
                <a href="#" class="text-[#E5E5E5] hover:text-[#d1c7b7] transition-colors duration-200 font-bebas text-[1.5rem] uppercase no-underline">Sobre Nosotros</a>
                <a href="#" class="text-[#E5E5E5] hover:text-[#d1c7b7] transition-colors duration-200 font-bebas text-[1.5rem] uppercase no-underline">Precios</a>
                <a href="#" class="text-[#E5E5E5] hover:text-[#d1c7b7] transition-colors duration-200 font-bebas text-[1.5rem] uppercase no-underline">Reseñas</a>
            </nav>
        </div>
        
        <div class="hidden lg:flex items-center">
            @auth
                <div class="flex items-center gap-[2rem]">
                    <a href="{{ route('dashboard') }}">
                        <img class="h-[3rem] w-auto object-contain rounded-full border border-[#d1c7b7]" 
                            src="{{ Auth::user()->foto_perfil ? asset(Auth::user()->foto_perfil) : asset('img/defaultProfileImage.png') }}" 
                            alt="Perfil">
                    </a>
                    
                    @hasanyrole('admin|peluquero')
                        <a href="{{ route('admin.inicio') }}" class="bg-[#d1c7b7] text-[#413B36] hover:bg-[#c4b9a6] px-[1.8rem] py-[0.2rem] rounded-[0.4rem] text-[1.5rem] uppercase no-underline font-bebas">Gestionar Peluquería</a>
                    @endhasanyrole
                    
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-[#E5E5E5] hover:text-[#d1c7b7] transition-colors duration-200 text-[1.5rem] uppercase no-underline font-bebas bg-transparent border-none cursor-pointer">
                            Cerrar Sesión
                        </button>
                    </form>
                </div>
            @else
                <div class="flex items-center gap-[2rem]">
                    <a href="{{ route('login') }}" class="inline-block text-[#E5E5E5] hover:text-[#d1c7b7] transition-colors duration-200 font-bebas text-[1.5rem] uppercase no-underline">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="inline-block bg-[#d1c7b7] text-[#413B36] hover:bg-[#c4b9a6] font-bebas px-[1.8rem] py-[0.2rem] rounded-[0.4rem] text-[1.5rem] uppercase no-underline">Registrarse</a>
                </div>
            @endauth
        </div>

        <button id="botonHamburguesa" class="flex lg:hidden flex-col justify-between w-8 h-5 bg-transparent border-none cursor-pointer z-50 focus:outline-none">
            <span class="w-full h-[3px] bg-[#E5E5E5] rounded transition-all duration-300 origin-left"></span>
            <span class="w-full h-[3px] bg-[#E5E5E5] rounded transition-all duration-300"></span>
            <span class="w-full h-[3px] bg-[#E5E5E5] rounded transition-all duration-300 origin-left"></span>
        </button>

        <div id="menuMovil" class="hidden absolute top-full left-0 w-full bg-[#080403] border-b-[0.4rem] border-[#40362B] flex-col items-center gap-5 py-6 z-40 shadow-2xl">
            <a href="index.php" class="text-[#E5E5E5] font-bebas text-[1.6rem] uppercase no-underline">Inicio</a>
            <a href="#" class="text-[#E5E5E5] font-bebas text-[1.6rem] uppercase no-underline">Sobre Nosotros</a>
            <a href="#" class="text-[#E5E5E5] font-bebas text-[1.6rem] uppercase no-underline">Precios</a>
            <a href="#" class="text-[#E5E5E5] font-bebas text-[1.6rem] uppercase no-underline">Reseñas</a>
            
            <hr class="w-4/5 border-[#40362B] my-2">
            
            @auth
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 text-[#E5E5E5] font-bebas text-[1.6rem] uppercase no-underline">
                    <img class="h-[2.5rem] w-auto object-contain rounded-full border border-[#d1c7b7]" 
                        src="{{ Auth::user()->foto_perfil ? asset(Auth::user()->foto_perfil) : asset('img/defaultProfileImage.png') }}" 
                        alt="Perfil">
                    Ver Perfil
                </a>

                @hasanyrole('admin|peluquero')
                    <a href="{{ route('admin.inicio') }}" class="bg-[#d1c7b7] text-[#413B36] px-[2rem] py-[0.3rem] rounded-[0.4rem] text-[1.4rem] font-bold uppercase no-underline font-bebas">
                        Gestionar Peluquería
                    </a>
                @endhasanyrole

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-700 text-[#E5E5E5] px-[2rem] py-[0.3rem] rounded-[0.4rem] text-[1.4rem] font-bold uppercase no-underline font-bebas cursor-pointer">
                        Cerrar Sesión
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-[#E5E5E5] font-bebas text-[1.6rem] uppercase no-underline">
                    Iniciar Sesión
                </a>
                <a href="{{ route('register') }}" class="bg-[#d1c7b7] text-[#413B36] font-bebas px-[2.5rem] py-[0.3rem] rounded-[0.4rem] text-[1.5rem] font-bold uppercase no-underline">
                    Registrarse
                </a>
            @endauth
        </div>

    </header>

    <script>
        const botonHamburguesa = document.getElementById('botonHamburguesa');
        const menuMovil = document.getElementById('menuMovil');

        botonHamburguesa.addEventListener('click', () => {
            menuMovil.classList.toggle('hidden');
            menuMovil.classList.toggle('flex');
            
            const lineas = botonHamburguesa.querySelectorAll('span');
            lineas[0].classList.toggle('rotate-45');
            lineas[0].classList.toggle('translate-x-1');
            lineas[1].classList.toggle('opacity-0');
            lineas[2].classList.toggle('-rotate-45');
            lineas[2].classList.toggle('translate-x-1');
        });
    </script>