@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="">
        Carrusel en proceso...
    </div>

    {{-- La mejor seleccion de componentes --}}
    <div class="mt-16 mb-20 flex justify-center items-center w-full">
        <div class="flex flex-row w-5/12 gap-2">
            <div class="w-1/2 items-center">
                <h3 class="font-medium text-3xl items-center">La mejor selección de componentes de PC</h3>
            </div>
            <div class="w-1/2">
                <p class="text-sm leading-4 font-['montserrat']">
                    Encuentra todo lo que necesitas para armar tu computadora perfecta, realizar compras en línea y administrar tu cuenta de manera fácil y segura.
                </p>
                <div class="flex justify-center items-center gap-4 mt-4 font-['roboto'] font-medium">
                    <a href="#" class="py-1 px-9 bg-azul border border-azul rounded-lg text-white shadow hover:shadow-xl">
                        Explorar
                    </a>
                    <a href="#" class="py-1 px-7 border border-black rounded-lg shadow hover:shadow-xl">
                        Registrarse
                    </a>
                </div>
            </div>    
        </div>
    </div>

    {{-- Productos destacados --}}
    <section class="mt-16 mb-20 flex flex-col justify-center items-center w-full">
        <div>
            <h3 class="font-medium text-3xl items-center">Productos Destacados</h3>
            <p class="text-center mt-4">Los productos más vendidos</p>
        </div>
        {{-- Tarjetas de productos --}}
        <div class="flex flex-row w-7/12 text-center mt-7 gap-4">
            <div class="w-1/3 border-2 border-gray-200 rounded-lg pt-2 pb-5 px-3 font-medium shadow-xl">
                {{-- Imagen --}}
                <div class="px-2">
                    <img src="{{ asset('img/rtx3060.jpg') }}" alt="Imagen Producto">
                </div>
                {{-- Info Producto --}}
                <div>
                    <p class="mt-4 mb-2 leading-relaxed">ZOTAC GAMING NVIDIA GEFORCE RTX 3060</p>
                    <p class="mb-3 text-verde">Tarjeta de Video</p>
                    <p class="mb-3 font-['roboto'] text-lg">MXN $16,000.00</p>
                </div>
                <button class="py-2 px-4 bg-azul border border-azul rounded-lg text-white shadow hover:shadow-xl">Agregar al carrito</button>
            </div>
            <div class="w-1/3 border-2 border-gray-200 rounded-lg pt-2 pb-5 px-3 font-medium shadow-xl">
                {{-- Imagen --}}
                <div class="px-2">
                    <img src="{{ asset('img/rtx3060.jpg') }}" alt="Imagen Producto">
                </div>
                {{-- Info Producto --}}
                <div>
                    <p class="mt-4 mb-2 leading-relaxed">ZOTAC GAMING NVIDIA GEFORCE RTX 3060</p>
                    <p class="mb-3 text-verde">Tarjeta de Video</p>
                    <p class="mb-3 font-['roboto'] text-lg">MXN $16,000.00</p>
                </div>
                <button class="py-2 px-4 bg-azul border border-azul rounded-lg text-white shadow hover:shadow-xl">Agregar al carrito</button>
            </div>
            <div class="w-1/3 border-2 border-gray-200 rounded-lg pt-2 pb-5 px-3 font-medium shadow-xl">
                {{-- Imagen --}}
                <div class="px-2">
                    <img src="{{ asset('img/rtx3060.jpg') }}" alt="Imagen Producto">
                </div>
                {{-- Info Producto --}}
                <div>
                    <p class="mt-4 mb-2 leading-relaxed">ZOTAC GAMING NVIDIA GEFORCE RTX 3060</p>
                    <p class="mb-3 text-verde">Tarjeta de Video</p>
                    <p class="mb-3 font-['roboto'] text-lg">MXN $16,000.00</p>
                </div>
                <button class="py-2 px-4 bg-azul border border-azul rounded-lg text-white shadow hover:shadow-xl">Agregar al carrito</button>
            </div>
        </div>
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
