@extends('layouts.front')

@section('content')
    <main>
        <section id="heroWeb"
            class="max-w-auto flex relative overflow-hidden flex-col items-center justify-between py-[8rem] h-[57rem]
                    bg-cover bg-no-repeat" style="background-image: url('{{ asset('img/fondoHero.avif') }}');">

            <div>
                <!-- Información principal -->
                <div id="informacionPrincipal" class="flex flex-col gap-[1vw] items-center">
                    <p class="text-[#e5e5e5] text-[2.5rem] font-girassol">1993</p>
                    <h1 class="text-[#e5e5e5] text-[5rem] text-center uppercase font-girassol font-thin max-w-[15rem] md:max-w-[45rem] lg:max-w-[50rem]">
                        Barber Shop
                    </h1>
                </div>

                <!-- Botones -->
                <div id="botonesHero" class="flex flex-col lg:flex-row gap-[1.5rem] lg:gap-[1.5rem] mt-[6rem] items-center">
                    <a href="{{ route('clientbookings.create') }}"
                        class="text-[#413B36] text-center bg-[#D1C7B7] py-[0.2rem] px-[3rem] rounded-[0.4rem] content-center
                            uppercase no-underline font-bebas text-[1.5rem] max-w-[15rem]">
                        Reservar Cita
                    </a>
                    <a href=""
                        class="border border-[#D1C7B7] text-center py-[0.2rem] px-[2rem] rounded-[0.4rem]
                            text-[#e5e5e5] uppercase no-underline font-bebas text-[1.5rem] max-w-max">
                        Nuestros Precios
                    </a>
                </div>
            </div>

            <!-- Patrocinadores -->
            <div id="patrocHero" class="flex flex-col pt-[4rem] lg:flex-row gap-3 lg:gap-6">
                <p class="text-[1.2rem] text-center font-sorts [font-variant-caps:small-caps] text-[#E5E5E5]">Synthesia</p>
                <p class="text-[1.2rem] text-center font-sorts [font-variant-caps:small-caps] text-[#E5E5E5]">LaunchDarkly</p>
                <p class="text-[1.2rem] text-center font-sorts [font-variant-caps:small-caps] text-[#E5E5E5]">Amplitude</p>
                <p class="text-[1.2rem] text-center font-sorts [font-variant-caps:small-caps] text-[#E5E5E5]">Coda</p>
            </div>

            <img id="maquinaHero"
                class="absolute -bottom-[5vh] -right-[0vw] w-[8rem] md:w-[28vw] lg:w-[20rem] max-w-none pointer-events-none z-10"
                src="{{ asset('img/maquinaHero.png') }}" loading="lazy" alt="Maquina Cortadora">
        </section>

        <section id="sobreNosotros"
            class="flex flex-col lg:flex-row pt-[4rem] pb-[6rem] md:pb-[8rem] px-[1.5rem] justify-center gap-[5rem] lg:gap-[10rem] bg-[#FAFAFA] items-center">

            <!-- Imágenes -->
            <div id="contImgSobreNosotros" class="relative pb-[15vh] order-2 lg:order-1">
                <img class="w-[15rem] md:w-[18rem] lg:w-[20rem]" src="{{ asset('img/sobreNosotros1.png') }}" loading="lazy" alt="">
                <div>
                    <img id="sobreNosotrosImagenDerecha"
                        class="absolute top-[8rem] left-[6rem] lg:top-[8rem] md:left-[8rem] lg:left-[10rem] w-[10rem] md:w-[13rem] lg:w-[13rem] bg-[#D1C7B7] p-[0.4vw] rounded-[0.5rem]"
                        src="{{ asset('img/sobreNosotros2.png') }}" loading="lazy" alt="">
                </div>
            </div>

            <!-- Contenido -->
            <div id="contenidoSobreNosotros" class="flex flex-col gap-[1rem] order-1 lg:order-2">

                <!-- Titulo seccion -->
                <div class="flex gap-[1vw] w-max justify-center items-center self-center lg:self-start mt-[5rem] px-[1vw] py-[0.2rem] rounded-full bg-[#101111]">
                    <figure class="flex items-center justify-center">
                        <svg class="stroke-[#413B36] bg-[#D1C7B7] p-[0.3vw] rounded-full w-[2.2vw] h-[2.2vw] min-w-[24px] min-h-[24px]"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 21v-15c0 -1 1 -2 2 -2h5c1 0 2 1 2 2v15" />
                            <path d="M16 8h2c1 0 2 1 2 2v11" />
                            <path d="M3 21h18" />
                            <path d="M10 12v0" />
                            <path d="M10 16v0" />
                            <path d="M10 8v0" />
                            <path d="M7 12v0" />
                            <path d="M7 16v0" />
                            <path d="M7 8v0" />
                            <path d="M17 12v0" />
                            <path d="M17 16v0" />
                        </svg>
                    </figure>
                    <p class="font-bebas text-[1.5rem] md:text-[1.5rem] uppercase underline decoration-[#D1C7B7] text-[#E5E5E5]">
                        Sobre Nosotros
                    </p>
                </div>

                <h2 class="text-[2.2rem] font-girassol text-center lg:text-left font-thin text-[#413B36]">
                    Nuestro Gran Negocio
                </h2>

                <p id="infoApartado"
                    class="max-w-[25rem] md:max-w-[40rem] lg:max-w-[25rem] font-poppins text-[#413B36] text-center lg:text-left">
                    En el corazón de Elche, Alicante, Barber Shop es más que una barbería. Hemos
                    rescatado la esencia de la barbería ofreciendo un auténtico afeitado, garantizando un resultado
                    impecable.
                </p>

                <!-- Botones -->
                <div id="botonesSobreNosotros" class="flex flex-col lg:flex-row gap-[0.5rem] lg:gap-[2rem] items-center">
                    <a href=""
                        class="flex items-center gap-[0.25rem] mt-[2vh]
                                text-[#413B36] bg-[#D1C7B7] py-[0.2rem] px-[1rem] rounded-[0.4rem] border border-[#927860] content-center
                                uppercase no-underline font-bebas text-[1.5rem] w-[15rem] lg:w-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="#413B36" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                            <path d="M9 13a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                        </svg>
                        Galería de Imágenes
                    </a>
                    <a href=""
                        class="flex items-center gap-[0.5vw] mt-[2vh]
                                text-[#413B36] bg-[#D1C7B7] py-[0.2rem] px-[1rem] rounded-[0.4rem] border border-[#927860] content-center
                                uppercase no-underline font-bebas text-[1.5rem] w-[15rem] lg:w-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="#413B36" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4" />
                            <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                            <path d="M2 15h10" />
                            <path d="m9 18 3-3-3-3" />
                        </svg>
                        Trabaja Con Nosotros
                    </a>
                </div>
            </div>
        </section>

        <section id="precios"
            class="px-[10vw] py-[10vh] flex flex-col items-center gap-[2rem] bg-[#262929]">

            <h2 class="text-[2.2rem] font-girassol font-thin
                       text-[#E5E5E5] underline decoration-[#927860] decoration-wavy [text-underline-offset:0.7rem] text-center">
                Nuestros Increibles Precios
            </h2>

            <!-- Título apartado precios -->
            <div class="flex gap-[0.5vw] w-max justify-center items-center px-[1vw] py-[0.2vw] rounded-full bg-[#F8F6F4]">
                <figure>
                    <svg class="stroke-[#413B36] bg-[#D1C7B7] p-[0.1vw] rounded-[1vw]"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.9427 16.8354C20.2864 12.8866 18.2432 9.94613 16.467 8.219C15.9501 7.71642 15.6917 7.46513 15.1208 7.23257C14.5499 7 14.0592 7 13.0778 7H10.9222C9.94081 7 9.4501 7 8.87922 7.23257C8.30834 7.46513 8.04991 7.71642 7.53304 8.219C5.75682 9.94613 3.71361 12.8866 3.05727 16.8354C2.56893 19.7734 5.27927 22 8.30832 22H15.6917C18.7207 22 21.4311 19.7734 20.9427 16.8354Z" stroke="#413B36" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7.25662 4.44287C7.05031 4.14258 6.75128 3.73499 7.36899 3.64205C8.00392 3.54651 8.66321 3.98114 9.30855 3.97221C9.89237 3.96413 10.1898 3.70519 10.5089 3.33548C10.8449 2.94617 11.3652 2 12 2C12.6348 2 13.1551 2.94617 13.4911 3.33548C13.8102 3.70519 14.1076 3.96413 14.6914 3.97221C15.3368 3.98114 15.9961 3.54651 16.631 3.64205C17.2487 3.73499 16.9497 4.14258 16.7434 4.44287L15.8105 5.80064C15.4115 6.38146 15.212 6.67187 14.7944 6.83594C14.3769 7 13.8373 7 12.7582 7H11.2418C10.1627 7 9.6231 7 9.20556 6.83594C8.78802 6.67187 8.5885 6.38146 8.18945 5.80064L7.25662 4.44287Z" stroke="#413B36" stroke-width="2" stroke-linejoin="round" />
                        <path d="M13.6267 12.9186C13.4105 12.1205 12.3101 11.4003 10.9892 11.9391C9.66829 12.4778 9.45847 14.2113 11.4565 14.3955C12.3595 14.4787 12.9483 14.2989 13.4873 14.8076C14.0264 15.3162 14.1265 16.7308 12.7485 17.112C11.3705 17.4932 10.006 16.8976 9.85742 16.0517M11.8417 10.9927V11.7531M11.8417 17.2293V17.9927" stroke="#413B36" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </figure>
                <p class="font-bebas text-[1.2rem] uppercase underline decoration-[#D1C7B7] text-[#413B36]">
                    Precios
                </p>
            </div>

            <div id="contenedorTarjetasPrecios" class="flex flex-col lg:w-4/5 grid grid-rows-2 grid-cols-12 gap-[1vw]">
                <!-- Corte Básico -->
                <div id="corteBasico" class="bg-[#EBE6E1] px-[2vw] pb-[3vh] rounded-[5px] col-span-12 lg:col-span-6">
                    <p class="bg-[#927860] font-bebas text-[#E5E5E5] rounded-b-[3px]
                               underline decoration-[#D1C7B7] [text-underline-offset:0.15rem]
                               py-[0.2vh] px-[0.5vw] max-w-[20vw] md:max-w-[10vw] lg:max-w-[5vw] min-w-max text-center mb-[1vh]">
                        Caballero
                    </p>
                    <div class="flex flex-row flex-wrap justify-between mb-[1.5vh] mt-[2vh] md:mt-[0vh] lg:mt-[0vh] md:mb-[0vh] lg:mb-[0vh]">
                        <p class=" font-poppins text-[1.4rem] text-[#413B36] min-w-max">Corte Básico</p>
                        <div class="flex flex-row gap-[0.1vw]">
                            <p class="font-poppins text-[2rem] text-[#413B36]">17,00</p>
                            <svg class="self-center mt-[1.2vh]" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="#413B36" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                <path d="M14.401 8c-.669 -.628 -1.5 -1 -2.401 -1c-2.21 0 -4 2.239 -4 5s1.79 5 4 5c.9 0 1.731 -.372 2.4 -1" />
                                <path d="M7 10.5h4" />
                                <path d="M7 13.5h4" />
                            </svg>
                        </div>
                    </div>
                    <p class="font-poppins text-[#413B36] text-[0.82rem] max-w-full mb-[2vh] md:max-w-[25.5rem] lg:max-w-[21.5rem]">
                        Servicio esencial y profesional garantizando un estilo impecable, con lavado y productos de calidad.
                    </p>
                    <div class="flex flex-col md:flex-row lg:flex-row items-center">
                        <div class="w-full">
                            <div class="grid grid-cols-[repeat(auto-fit,minmax(7rem,1fr))] mb-[3vh]">
                                <?php
                                $serviciosBasico = ['Corte', 'Lavado', 'Productos', 'Bebidas'];
                                $noIncluidos = ['Barba', 'Masaje Facial'];
                                ?>
                                <?php foreach ($serviciosBasico as $s): ?>
                                    <div class="mt-[1vh] flex flex-row gap-[0.5vw] w-max">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 12.75L11.25 15L15 9.75M21 12C21 13.2683 20.3704 14.3895 19.4067 15.0682C19.6081 16.2294 19.2604 17.4672 18.3637 18.3639C17.467 19.2606 16.2292 19.6083 15.068 19.4069C14.3893 20.3705 13.2682 21 12 21C10.7319 21 9.61072 20.3705 8.93204 19.407C7.77066 19.6086 6.53256 19.261 5.6357 18.3641C4.73886 17.4673 4.39125 16.2292 4.59286 15.0678C3.62941 14.3891 3 13.2681 3 12C3 10.7319 3.62946 9.61077 4.59298 8.93208C4.39147 7.77079 4.7391 6.53284 5.63587 5.63607C6.53265 4.73929 7.77063 4.39166 8.93194 4.59319C9.61061 3.62955 10.7318 3 12 3C13.2682 3 14.3893 3.6295 15.068 4.59307C16.2294 4.39145 17.4674 4.73906 18.3643 5.6359C19.2611 6.53274 19.6087 7.77081 19.4071 8.93218C20.3706 9.61087 21 10.7319 21 12Z" stroke="#413B36" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <p class="font-poppins text-[#413B36] text-[0.85rem] font-medium ml-[-0.35vw]"><?= $s ?></p>
                                    </div>
                                <?php endforeach; ?>
                                <?php foreach ($noIncluidos as $s): ?>
                                    <div class="mt-[1vh] flex flex-row gap-[0.5vw] w-max">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                            fill="none" stroke="#413B36" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z" />
                                            <line x1="15" x2="9" y1="9" y2="15" />
                                            <line x1="9" x2="15" y1="9" y2="15" />
                                        </svg>
                                        <p class="font-poppins text-[#413B36] text-[0.85rem] font-medium ml-[-0.35vw]"><?= $s ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="w-max">
                                <a class="flex items-center gap-[0.5vw] text-[#413B36] bg-[#D1C7B7] py-[0.2rem] px-[2rem] rounded-[0.4rem] border border-[#927860] content-center uppercase no-underline font-bebas text-[1.5rem]" href="{{ route('clientbookings.create') }}">
                                    Reservar Cita
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#413B36" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 3a9 9 0 1 0 0 18a9 9 0 0 0 0 -18" />
                                        <path d="M16 12l-4 -4" />
                                        <path d="M16 12h-8" />
                                        <path d="M12 16l4 -4" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <img class="mt-[2vh]" src="{{ asset('img/tijerasPrecio1.png') }}" loading="lazy" alt="">
                    </div>
                </div>

                <!-- Corte + Barba -->
                <div id="corteBarba" class="bg-[#EBE6E1] px-[2vw] pb-[3vh] rounded-[5px] col-span-12 lg:col-span-6">
                    <p class="bg-[#927860] font-bebas text-[#E5E5E5] rounded-b-[3px]
                               underline decoration-[#D1C7B7] [text-underline-offset:0.15rem]
                               py-[0.2vh] px-[0.5vw] max-w-[20vw] md:max-w-[10vw] lg:max-w-[5vw] min-w-max text-center mb-[1vh]">
                        Caballero
                    </p>
                    <div class="flex flex-row flex-wrap justify-between mb-[1.5vh] mt-[2vh] md:mt-[0vh] lg:mt-[0vh] md:mb-[0vh] lg:mb-[0vh]">
                        <p class="font-poppins text-[1.4rem] text-[#413B36] min-w-max">Corte + Barba</p>
                        <div class="flex flex-row gap-[0.1vw]">
                            <p class="font-poppins text-[2rem] text-[#413B36]">27,00</p>
                            <svg class="self-center mt-[1.2vh]" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="#413B36" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                <path d="M14.401 8c-.669 -.628 -1.5 -1 -2.401 -1c-2.21 0 -4 2.239 -4 5s1.79 5 4 5c.9 0 1.731 -.372 2.4 -1" />
                                <path d="M7 10.5h4" />
                                <path d="M7 13.5h4" />
                            </svg>
                        </div>
                    </div>
                    <p class="font-poppins text-[#413B36] text-[0.82rem] max-w-full mb-[2vh] md:max-w-[25.5rem] lg:max-w-[21.5rem]">
                        Transformación completa: Corte combinado con diseño, perfilado a navaja y tratamiento de barba que mereces.
                    </p>
                    <div class="flex flex-col md:flex-row lg:flex-row items-center">
                        <div class="w-full">
                            <div class="grid grid-cols-[repeat(auto-fit,minmax(7rem,1fr))] mb-[3vh]">
                                <?php
                                $serviciosBarba = ['Corte', 'Lavado', 'Productos', 'Bebidas', 'Barba', 'Masaje Facial'];
                                foreach ($serviciosBarba as $s):
                                ?>
                                    <div class="mt-[1vh] flex flex-row gap-[0.5vw] w-max">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 12.75L11.25 15L15 9.75M21 12C21 13.2683 20.3704 14.3895 19.4067 15.0682C19.6081 16.2294 19.2604 17.4672 18.3637 18.3639C17.467 19.2606 16.2292 19.6083 15.068 19.4069C14.3893 20.3705 13.2682 21 12 21C10.7319 21 9.61072 20.3705 8.93204 19.407C7.77066 19.6086 6.53256 19.261 5.6357 18.3641C4.73886 17.4673 4.39125 16.2292 4.59286 15.0678C3.62941 14.3891 3 13.2681 3 12C3 10.7319 3.62946 9.61077 4.59298 8.93208C4.39147 7.77079 4.7391 6.53284 5.63587 5.63607C6.53265 4.73929 7.77063 4.39166 8.93194 4.59319C9.61061 3.62955 10.7318 3 12 3C13.2682 3 14.3893 3.6295 15.068 4.59307C16.2294 4.39145 17.4674 4.73906 18.3643 5.6359C19.2611 6.53274 19.6087 7.77081 19.4071 8.93218C20.3706 9.61087 21 10.7319 21 12Z" stroke="#413B36" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <p class="font-poppins text-[#413B36] text-[0.85rem] font-medium ml-[-0.35vw]"><?= $s ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="w-max">
                                <a class="flex items-center gap-[0.5vw] text-[#413B36] bg-[#D1C7B7] py-[0.2rem] px-[2rem] rounded-[0.4rem] border border-[#927860] content-center uppercase no-underline font-bebas text-[1.5rem]" href="{{ route('clientbookings.create') }}">
                                    Reservar Cita
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#413B36" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 3a9 9 0 1 0 0 18a9 9 0 0 0 0 -18" />
                                        <path d="M16 12l-4 -4" />
                                        <path d="M16 12h-8" />
                                        <path d="M12 16l4 -4" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <img class="mt-[2vh]" src="{{ asset('img/tijerasPrecio2.png') }}" loading="lazy" alt="">
                    </div>
                </div>

                <!-- Corte Niño -->
                <div id="corteNinyo" class="bg-[#EBE6E1] px-[2vw] pb-[3vh] rounded-[5px] col-span-12 lg:col-span-5">
                    <p class="bg-[#927860] font-bebas text-[#E5E5E5] rounded-b-[3px]
                               underline decoration-[#D1C7B7] [text-underline-offset:0.15rem]
                               py-[0.2vh] px-[0.5vw] max-w-[20vw] md:max-w-[10vw] lg:max-w-[5vw] min-w-max text-center mb-[1vh]">
                        Niño
                    </p>
                    <div class="flex flex-row flex-wrap justify-between mb-[1.5vh] mt-[2vh] md:mt-[0vh] lg:mt-[0vh] md:mb-[0vh] lg:mb-[0vh]">
                        <p class="font-poppins text-[1.4rem] text-[#413B36]">Corte Niño</p>
                        <div class="flex flex-row gap-[0.1vw]">
                            <p class="font-poppins text-[2rem] text-[#413B36]">12,00</p>
                            <svg class="self-center mt-[1.2vh]" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="#413B36" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                <path d="M14.401 8c-.669 -.628 -1.5 -1 -2.401 -1c-2.21 0 -4 2.239 -4 5s1.79 5 4 5c.9 0 1.731 -.372 2.4 -1" />
                                <path d="M7 10.5h4" />
                                <path d="M7 13.5h4" />
                            </svg>
                        </div>
                    </div>
                    <p class="font-poppins text-[#413B36] text-[0.82rem] max-w-full mb-[2vh] md:max-w-[25.5rem] lg:max-w-[21.5rem]">
                        Transformación completa: Corte combinado con diseño, perfilado a navaja y tratamiento de barba que mereces.
                    </p>
                    <div class="flex flex-col md:flex-row lg:flex-row items-center">
                        <div class="w-full">
                            <div class="grid grid-cols-[repeat(auto-fit,minmax(7rem,1fr))] mb-[3vh]">
                                <?php
                                $serviciosNinyo = ['Corte', 'Lavado', 'Productos', 'Bebidas', 'Barba', 'Masaje Facial'];
                                foreach ($serviciosNinyo as $s):
                                ?>
                                    <div class="mt-[1vh] flex flex-row gap-[0.5vw] w-max">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 12.75L11.25 15L15 9.75M21 12C21 13.2683 20.3704 14.3895 19.4067 15.0682C19.6081 16.2294 19.2604 17.4672 18.3637 18.3639C17.467 19.2606 16.2292 19.6083 15.068 19.4069C14.3893 20.3705 13.2682 21 12 21C10.7319 21 9.61072 20.3705 8.93204 19.407C7.77066 19.6086 6.53256 19.261 5.6357 18.3641C4.73886 17.4673 4.39125 16.2292 4.59286 15.0678C3.62941 14.3891 3 13.2681 3 12C3 10.7319 3.62946 9.61077 4.59298 8.93208C4.39147 7.77079 4.7391 6.53284 5.63587 5.63607C6.53265 4.73929 7.77063 4.39166 8.93194 4.59319C9.61061 3.62955 10.7318 3 12 3C13.2682 3 14.3893 3.6295 15.068 4.59307C16.2294 4.39145 17.4674 4.73906 18.3643 5.6359C19.2611 6.53274 19.6087 7.77081 19.4071 8.93218C20.3706 9.61087 21 10.7319 21 12Z" stroke="#413B36" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <p class="font-poppins text-[#413B36] text-[0.85rem] font-medium ml-[-0.35vw]"><?= $s ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="w-max">
                                <a class="flex items-center gap-[0.5vw] text-[#413B36] bg-[#D1C7B7] py-[0.2rem] px-[2rem] rounded-[0.4rem] border border-[#927860] content-center uppercase no-underline font-bebas text-[1.5rem]" href="{{ route('clientbookings.create') }}">
                                    Reservar Cita
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#413B36" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 3a9 9 0 1 0 0 18a9 9 0 0 0 0 -18" />
                                        <path d="M16 12l-4 -4" />
                                        <path d="M16 12h-8" />
                                        <path d="M12 16l4 -4" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <img class="mt-[2vh]" src="{{ asset('img/tijerasPrecio3.png') }}" loading="lazy" alt="">
                    </div>
                </div>

                <!-- Especiales -->
                <div id="corteEspeciales" class="bg-[#EBE6E1] px-[2vw] pb-[3vh] rounded-[5px] flex flex-col lg:flex-row gap-[1vw] col-span-12 lg:col-span-7">

                    <div id="principalEspecial" class="pt-[2vh] flex flex-row gap-[1vw] lg:w-2/4 h-full order-2 lg:order-1">
                        <div class="bg-[#D1C7B7] w-full h-full rounded-[12px] flex flex-col items-center">
                            <p class="bg-[#927860] font-bebas text-[#E5E5E5] rounded-b-[3px]
                                       underline decoration-[#D1C7B7] [text-underline-offset:0.15rem]
                                       py-[0.2vh] px-[0.5vw] max-w-[20vw] md:max-w-[10vw] lg:max-w-[5vw] min-w-max text-center mb-[1vh]">
                                Tintes
                            </p>
                            <svg class="lg:mt-[50%]" width="84" height="84" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.6972 15H8C6.89543 15 6 14.0951 6 12.9788C6 11.8625 6.89796 10.9517 8.00141 11.002C12.6902 11.2157 15.2951 12.1485 16.384 12.6526C16.78 12.836 17 13.2432 17 13.6834C17 14.4105 16.4167 15 15.6972 15Z" stroke="#413B36" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M17 14L20.9401 3.48443C21.1497 2.90943 20.7906 2.29091 20.1533 2.12892C18.5192 1.71359 16.8081 2.31124 16.2695 3.78511C15.6441 5.49648 15 8.13095 15 12" stroke="#413B36" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M15 7.96065C15 7.96065 11.6187 6.56598 10.3204 7.13972C9.93065 7.31195 9.59819 7.59728 9.36369 7.96079C9 8.52455 9 9.3497 9 11" stroke="#413B36" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M6 13V16C6 16.9319 6 17.3978 5.84776 17.7654C5.64477 18.2554 5.25542 18.6448 4.76537 18.8478C4.39782 19 3.93188 19 3 19" stroke="#413B36" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12 15V21" stroke="#413B36" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M10 21H14" stroke="#413B36" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="bg-[#D1C7B7] w-full h-full rounded-[12px] flex flex-col items-center">
                            <p class="bg-[#927860] font-bebas text-[#E5E5E5] rounded-b-[3px]
                                       underline decoration-[#D1C7B7] [text-underline-offset:0.15rem]
                                       py-[0.2vh] px-[0.5vw] max-w-[5vw] min-w-max text-center mb-[1vh]">
                                Domicilio
                            </p>
                            <svg class="lg:mt-[50%]" height="84" width="84" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="#413B36">
                                <path d="M222.14,105.85l-80-80a20,20,0,0,0-28.28,0l-80,80A19.86,19.86,0,0,0,28,120v96a12,12,0,0,0,12,12h64a12,12,0,0,0,12-12V164h24v52a12,12,0,0,0,12,12h64a12,12,0,0,0,12-12V120A19.86,19.86,0,0,0,222.14,105.85ZM204,204H164V152a12,12,0,0,0-12-12H104a12,12,0,0,0-12,12v52H52V121.65l76-76,76,76Z" />
                            </svg>
                        </div>
                    </div>

                    <div id="restoEspeciales" class="mt-[4vh] lg:w-2/4 flex flex-col gap-[3vh] order-1 lg:order-2">
                        <p class="font-poppins text-[#413B36] text-[1.18rem] font-bold">Serv. Especiales</p>
                        <p class="font-poppins text-[#413B36] text-[0.8rem]">
                            Para solicitar colaboración a medida, tintes o servicio a domicilio, contacta directamente al local antes de reservar.
                        </p>
                        <div class="w-max">
                            <a class="flex items-center gap-[0.5vw] text-[#413B36] bg-[#D1C7B7] py-[0.2rem] px-[0.5rem] rounded-[0.4rem] border border-[#927860] content-center uppercase no-underline font-bebas text-[1.5rem]" href="{{ route('clientbookings.create') }}">
                                Solicitar Información
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#413B36" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 3a9 9 0 1 0 0 18a9 9 0 0 0 0 -18" />
                                    <path d="M16 12l-4 -4" />
                                    <path d="M16 12h-8" />
                                    <path d="M12 16l4 -4" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-[2rem] flex flex-col gap-[1rem] items-center">
                <p class="text-[#EFECE5] w-max">Pago en efectivo, tarjeta o Bizum.</p>
                <div class="flex flex-row">
                    <figure class="w-[5rem]">
                        <img src="{{ asset('img/VISA-logo.png') }}" loading="lazy" alt="">
                    </figure>
                    <figure class="w-[5rem]">
                        <img src="{{ asset('img/mastercard-logo.png') }}" loading="lazy" alt="">
                    </figure>
                    <figure class="w-[8rem]">
                        <img src="{{ asset('img/bizum-logo.png') }}" loading="lazy" alt="">
                    </figure>
                </div>
            </div>
        </section>

        <?php
        $estrella = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M10.7881 3.21068C11.2364 2.13274 12.7635 2.13273 13.2118 3.21068L15.2938 8.2164L20.6979 8.64964C21.8616 8.74293 22.3335 10.1952 21.4469 10.9547L17.3295 14.4817L18.5874 19.7551C18.8583 20.8908 17.6229 21.7883 16.6266 21.1798L11.9999 18.3538L7.37329 21.1798C6.37697 21.7883 5.14158 20.8908 5.41246 19.7551L6.67038 14.4817L2.55303 10.9547C1.66639 10.1952 2.13826 8.74293 3.302 8.64964L8.70609 8.2164L10.7881 3.21068Z"
                fill="#CAB53E" stroke="#000000" stroke-width="1" />
        </svg>';

        $resenyas = [
            ['fecha' => '14/09/2025', 'texto' => 'El servicio a domicilio fue un lujo total. Asesoramiento detallado y resultados de barbería premium.', 'estrellas' => 5, 'autor' => 'Sergio Ramos', 'desc' => 'Ex-Capitán del Real Madrid CF'],
            ['fecha' => '24/10/2025', 'texto' => 'Mi imagen exige lo mejor. Necesitaba precisión total y la conseguí. Cuidado VIP y resultados impecables. Cero tiempo perdido.', 'estrellas' => 4, 'autor' => 'Cristiano Ronaldo', 'desc' => 'El mejor jugador del mundo'],
            ['fecha' => '01/11/2025', 'texto' => 'La planificación del servicio fue tan precisa como la ejecución. Es un trabajo con criterio y visión. El detalle marca la diferencia.', 'estrellas' => 4, 'autor' => 'Xabi Alonso', 'desc' => 'DT del Real Madrid CF'],
        ];
        ?>

        <section id="resenyas" class="py-[12vh] px-[12vw] bg-[#FAFAFA]">
            <div id="apartadoResenyas" class="flex flex-col md:flex-row lg:flex-row gap-[5vh] lg:gap-[5vw] justify-center">
                <?php foreach ($resenyas as $r): ?>
                    <article class="flex flex-col items-center gap-[1.5vh]">
                        <p class="font-bebas text-[1.6rem] text-[#413B36] underline decoration-[#927860] decoration-dotted [text-underline-offset:0.3rem]">
                            <?= $r['fecha'] ?>
                        </p>
                        <p class="max-w-auto md:max-w-[20vw] lg:max-w-[20vw] text-center font-poppins text-[0.9rem] text-[#413B36]">
                            <?= $r['texto'] ?>
                        </p>
                        <div class="flex flex-row gap-[0.5vw] mt-auto">
                            <?php for ($i = 0; $i < $r['estrellas']; $i++): ?>
                                <figure><?= $estrella ?></figure>
                            <?php endfor; ?>
                        </div>
                        <p class="font-poppins text-[0.9rem] text-[#413B36]"><?= $r['autor'] ?></p>
                        <p class="font-poppins text-[0.8rem] text-[#413B36] mt-[-1vh] text-center"><?= $r['desc'] ?></p>
                    </article>
                <?php endforeach; ?>
            </div>

            <div id="contentSecundarioResenyas" class="mt-[9vh] justify-self-center">
                <p class="mb-[1.5vh] uppercase font-bebas text-[1.6rem] text-[#413B36] underline decoration-[#927860] decoration-dotted [text-underline-offset:0.3rem]">
                    ¡Valoranos!
                </p>
                <figure>
                    <img src="{{ asset('img/ImagenReseñas.png') }}" loading="lazy" alt="">
                </figure>
                <p class="justify-self-end uppercase font-bebas text-[1.6rem] text-[#413B36] underline decoration-[#927860] decoration-dotted [text-underline-offset:0.3rem]">
                    Prueba nuestro estilo
                </p>
            </div>
        </section>

        <section id="contacto"
            class="py-[12vh] px-[12vw] flex flex-col gap-[3.5vw] items-center bg-[#262929]">

            <h2 class="text-[#F8F6F4] underline decoration-[#927860] decoration-wavy [text-underline-offset:0.7rem]
                       text-[2.7rem] uppercase font-girassol">
                Contacto
            </h2>

            <div id="estructuraContacto" class="flex flex-col lg:flex-row gap-[2vw] justify-center w-auto">

                <div id="tarjetaContacto"
                    class="flex flex-col gap-[2vh] bg-[#EFECE5] border border-[#413B36]
                           pt-[3vh] px-[2.5rem] pb-[5vh] rounded-[13px]">

                    <!-- Email -->
                    <div class="flex flex-row items-center gap-[0.3vw]">
                        <svg stroke="#413B36" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.25 4H18.75C20.483 4 21.8992 5.35645 21.9949 7.06558L22 7.25V16.75C22 18.483 20.6435 19.8992 18.9344 19.9949L18.75 20H5.25C3.51697 20 2.10075 18.6435 2.00514 16.9344L2 16.75V7.25C2 5.51697 3.35645 4.10075 5.06558 4.00514L5.25 4H18.75H5.25ZM20.5 9.373L12.3493 13.6637C12.1619 13.7623 11.9431 13.7764 11.7468 13.706L11.6507 13.6637L3.5 9.374V16.75C3.5 17.6682 4.20711 18.4212 5.10647 18.4942L5.25 18.5H18.75C19.6682 18.5 20.4212 17.7929 20.4942 16.8935L20.5 16.75V9.373ZM18.75 5.5H5.25C4.33183 5.5 3.57881 6.20711 3.5058 7.10647L3.5 7.25V7.679L12 12.1525L20.5 7.678V7.25C20.5 6.33183 19.7929 5.57881 18.8935 5.5058L18.75 5.5Z" fill="#413B36" />
                        </svg>
                        <p class="font-bebas text-[#413B36] text-[1.4rem]">EMAIL</p>
                    </div>
                    <div class="flex flex-col gap-[0.3vh] mt-[-1vh]">
                        <div class="flex flex-row gap-[0.3vw] flex-wrap">
                            <span class="font-poppins text-[0.8rem] text-[#413B36]">Preguntas Generales: </span>
                            <p class="font-poppins text-[0.8rem] text-[#927860]">contacto@barbershop.com</p>
                        </div>
                        <div class="flex flex-row gap-[0.3vw] flex-wrap">
                            <span class="font-poppins text-[0.8rem] text-[#413B36]">Incidencias: </span>
                            <p class="font-poppins text-[0.8rem] text-[#927860]">incidencias@barbershop.com</p>
                        </div>
                        <div class="flex flex-row gap-[0.3vw] flex-wrap">
                            <span class="font-poppins text-[0.8rem] text-[#413B36]">Trabajar Con Nosotros: </span>
                            <p class="font-poppins text-[0.8rem] text-[#927860]">recursoshumanos@barbershop.com</p>
                        </div>
                    </div>

                    <div id="separacionContacto" class="flex flex-col md:flex-row lg:flex-row gap-[4vw] justify-between">
                        <div>
                            <!-- Dirección -->
                            <div>
                                <div class="flex flex-row items-center gap-[0.3vw]">
                                    <svg stroke="#413B36" fill="#413B36" height="24" width="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M11,12H3.5L6,9.5L3.5,7H11V3L12,2L13,3V7H18L20.5,9.5L18,12H13V20A2,2 0 0,1 15,22H9A2,2 0 0,1 11,20V12Z" />
                                    </svg>
                                    <p class="font-bebas text-[#413B36] text-[1.4rem]">DIRECCIÓN</p>
                                </div>
                                <div>
                                    <div><span class="ml-[1vw] font-poppins text-[0.8rem] text-[#413B36]"><b>ELCHE</b></span></div>
                                    <div><span class="ml-[1vw] font-poppins text-[0.8rem] text-[#413B36]">Carrer del Salvador</span></div>
                                    <div><span class="ml-[1vw] font-poppins text-[0.8rem] text-[#413B36]">42, 03203</span></div>
                                    <div><span class="ml-[1vw] font-poppins text-[0.8rem] text-[#413B36]">Elx (Elche)</span></div>
                                    <div><span class="ml-[1vw] font-poppins text-[0.8rem] text-[#413B36]">Alicante, España</span></div>
                                </div>
                            </div>
                            <!-- Teléfono -->
                            <div class="mt-[2vh]">
                                <div class="flex flex-row items-center gap-[0.3vw]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="#413B36" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                                        <path d="M15 7a2 2 0 0 1 2 2" />
                                        <path d="M15 3a6 6 0 0 1 6 6" />
                                    </svg>
                                    <p class="font-bebas text-[#413B36] text-[1.4rem]">CONTACTO</p>
                                </div>
                                <div>
                                    <div><span class="ml-[1vw] font-poppins text-[0.8rem] text-[#413B36]">Teléfono Móvil</span></div>
                                    <div><span class="ml-[1vw] font-poppins text-[0.8rem] text-[#413B36]">+34 689 30 20 10</span></div>
                                </div>
                            </div>
                        </div>
                        <!-- Mapa -->
                        <div>
                            <iframe id="iframeContacto"
                                class="w-full h-full rounded-[12px] border border-[rgba(65,59,54,0.2)]"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3132.636562534022!2d-0.7001039233875257!3d38.2647343718661!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd63b6f318ba404d%3A0xeb6a633d573cdda4!2sC.%20Salvador%2C%2003203%20Elche%2C%20Alicante!5e0!3m2!1ses!2ses!4v1765310713946!5m2!1ses!2ses"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>

                <div id="imagenesContacto" class="py-[2vh] px-[2.5vw] hidden lg:block">
                    <div class="relative">
                        <img class="lg:w-min" src="{{ asset('img/contacto1.png') }}" loading="lazy" alt="">
                        <div>
                            <img class="lg:absolute  lg:right-[-11rem] lg:bottom-[-0.5rem] lg:w-min" id="derechaContacto" src="{{ asset('img/contacto2.png') }}" loading="lazy" alt="">
                        </div>
                        <div>
                            <img class="lg:absolute lg:right-[-5rem] lg:bottom-[-6rem] lg:w-min" id="centroContacto" src="{{ asset('img/contacto3.png') }}" loading="lazy" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </main>
@endsection