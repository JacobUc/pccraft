@extends('layouts.app')

@section('title', 'Home')

@section('content')
    {{-- Carrusel (Flowbite) --}}
    <div id="default-carousel" class="relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden md:h-carrusel">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-out" data-carousel-item>
                <a href="#">
                    <img src="{{asset('img/c1.jpg')}}" class="w-auto" alt="...">
                </a>
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-out flex justify-center items-center" data-carousel-item>
                <a href="#">
                    <img src="https://storage-asset.msi.com/mx/picture/banner/banner_1724226595498b008de895d58c9246aac3e4a5412d.jpeg" class="w-auto" alt="...">
                </a>
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-out flex justify-center items-center" data-carousel-item>
                <a href="#">
                    <img src="https://dlcdnwebimgs.asus.com/gain/DA860435-9650-40FC-8626-A62027D3803A/fwebp" class="w-auto" alt="...">
                </a>
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-out flex justify-center items-center" data-carousel-item>
                <a href="#">
                    <img src="https://storage-asset.msi.com/global/picture/image/feature/monitor/Optix-MEG381CQR-Plus/images/kv-bg.jpg" class="w-auto" alt="...">
                </a>
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-700 ease-out flex justify-center items-center" data-carousel-item>
                <a href="#">
                    <img src="https://dlcdnwebimgs.asus.com/gain/E073B1CE-873D-4D1B-993B-354F264FB228/fwebp" class="w-auto" alt="...">
                </a>
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    {{-- La mejor seleccion de componentes --}}
    <div class="mt-16 mb-20 flex justify-center items-center w-full">
        <div class="flex flex-row w-[48rem] gap-2 items-center">
            <div class="w-1/2">
                <h3 class="font-medium text-3xl">La mejor selección de componentes de PC</h3>
            </div>
            <div class="w-1/2">
                <p class="text-sm leading-5 font-['montserrat'] text-justify">
                    Encuentra todo lo que necesitas para armar tu computadora perfecta, realizar compras en línea y administrar tu cuenta de manera fácil y segura.
                </p>
                <div class="flex justify-center items-center gap-4 mt-4 font-['roboto'] font-medium">
                    <a href="#" class="w-40 py-1.5 border border-blue-700 rounded-lg text-center text-azul shadow-md shadow-gray-400 duration-300 hover:bg-azul hover:text-white">
                        Explorar
                    </a>
                    <a href="#" class="w-40 py-1.5 border border-black rounded-lg text-center shadow-md shadow-gray-400 duration-300 hover:bg-negro hover:text-white">
                        Registrarse
                    </a>
                </div>
            </div>    
        </div>
    </div>

    {{-- Productos Destacados --}}
    <section class="w-full mt-20 mb-20 mx-auto">
        <x-ecommerce.productos-recomendados :productosRecomendados="$productosRecomendados" />
    </section>
    

    {{-- Configurador (La mejor experiencia de compra...) --}}
    <div class="mt-16 mb-16 bg-negro text-white flex flex-col text-center">
        <div class="mt-10">
            <h3 class="text-2xl font-bold">La mejor experiencia de compra en componentes de computadoras</h3>
        </div>
        {{-- Carrusel --}}
        <div class="mt-10 flex justify-center">
            <img src="{{ asset('img/sec_conf.png') }}" alt="Imagen Computadora Configurada" class="w-96">
        </div>
        <div class="mt-6 pb-8 flex justify-center items-center w-full">
            <div class="flex flex-row w-7/12">
                <div class="w-3/4 items-center font-bold">
                    <p class="text-left text-4xl text-azul">Selecciona, compra y gestiona</p>
                    <p class="text-left text-4xl">tus componentes para armar tu computadora perfecta</p>
                </div>
                <div class="w-1/4 flex justify-center items-center">
                    <a href="#" class="py-2 px-5 bg-azul border border-azul rounded-lg text-white shadow-white hover:shadow-xl">
                        Configura tu PC
                    </a>
                </div>
            </div>
        </div>
    </div>


    {{-- Testimonios --}}
    <div class="mt-3 mb-20 flex flex-col justify-center items-center text-center">
        <div>
            <h2 class="text-4xl font-medium">Testimonios</h2>
            <p class="mt-4 text-slate-600">Algunas palabras de nuestros clientes</p>
        </div>
        {{-- Tarjetas Testimonios --}}
        <div class="mt-8 flex flex-row w-7/12 text-center gap-4">
            <div class="w-1/3 border border-gray-200 rounded-lg pt-2 pb-5 px-3 font-medium shadow-lg">
                {{-- Imagen y Estrellas--}}
                <div class="mt-3 flex flex-col items-center">
                    <img src="{{ asset('img/testimonio1.jpg') }}" 
                        alt="Imagen Testimonio 1" 
                        class="w-40 rounded-full">
                    <p class="mt-4 text-azul">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </p>
                </div>
                {{-- Comentario y Nombre --}}
                <div class="mt-4 mb-3 flex flex-col gap-4">
                    <p class="text-xl">"Los componentes funcionan a la perfección"</p>
                    <p class="text-slate-600 font-['roboto']">Luisa</p>
                </div>
            </div>

            <div class="w-1/3 border border-gray-200 rounded-lg pt-2 pb-5 px-3 font-medium shadow-lg">
                {{-- Imagen y Estrellas --}}
                <div class="mt-3 flex flex-col items-center">
                    <img src="{{ asset('img/testimonio2.jpeg') }}" 
                        alt="Imagen Testimonio 1" 
                        class="w-40 rounded-full">
                    <p class="mt-4 text-azul">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </p>
                </div>
                {{-- Comentario y Nombre --}}
                <div class="mt-4 mb-3 flex flex-col gap-4">
                    <p class="text-xl">"¡Amo mi ensamble! No más  Elden Ring a 30 fps"</p>
                    <p class="text-slate-600 font-['roboto']">Eduardo Venegas</p>
                </div>
            </div>

            <div class="w-1/3 border border-gray-200 rounded-lg pt-2 pb-5 px-3 font-medium shadow-lg">
                {{-- Imagen y Estrellas --}}
                <div class="mt-3 flex flex-col items-center">
                    <img src="{{ asset('img/testimonio3.png') }}" 
                        alt="Imagen Testimonio 1" 
                        class="w-40 rounded-full">
                    <p class="mt-4 text-azul">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </p>
                </div>
                {{-- Comentario y Nombre --}}
                <div class="mt-4 mb-3 flex flex-col gap-4">
                    <p class="text-xl">"La pc armada por PC-Craft es increible para renderizar"</p>
                    <p class="text-slate-600 font-['roboto']">Armando Salcedo</p>
                </div>
            </div>
        </div>
    </div>
    
@endsection