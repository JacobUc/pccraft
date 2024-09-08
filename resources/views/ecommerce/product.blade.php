@extends('layouts.app')

@section('title', $product->nombre)

@section('content')

    {{-- Menu Migajas de pan --}}
    <div class="mt-2 flex flex-col items-center w-full">
        <div class="mt-3 w-9/12 flex gap-10 text-start">
            <p class="font-['roboto'] text-sm text-azul font-bold">
                <a href="#">Productos</a> /
                <a href="#">{{ $product->category->nombre_categoria }}</a> /
                <span> {{ $product->nombre }} </span>
            </p>
        </div>
    </div>

    {{-- Descripcion producto --}}
    <div class="mt-6 mb-10 flex flex-col items-center w-full">
        {{-- Imagen y Especificaciones Tecnicas--}}
        <div class="mt-2 w-9/12 flex justify-center gap-5">
            {{-- Imagenes --}}
            <div class="w-6/12 flex justify-end">
                <img src="{{ asset('storage/' . $product->url_photo) }}" alt="Imagen Producto" class="h-80">  {{-- Como carajos pongo la imagen --}}
            </div>
            {{-- Especificaciones producto --}}
            <div class="w-6/12 pt-2 px-2.5">
                <h2 class="text-2xl font-medium">{{ $product->nombre }}</h2>
                <p class="mt-1 text-zinc-400">MODELO: {{ $product->modelo }}</p>
                <p class="mt-1 text-xs text-amber-500"> 
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>    
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <span class="text-sm text-black font-medium">4.9</span>
                    {{-- {{ $product->calificacion }} !Pendiente --}}
                </p>
                <p class="mt-5 font-['roboto'] text-2xl font-medium">
                    ${{ (100 - $product->descuento) * 0.01 * $product->precio }} MXN  {{-- !Calcularlo en el Controlador --}}
                    @if ( $product->descuento > 0 )
                        <span class="ml-1.5 text-zinc-400 line-through">${{ $product->precio }}</span>
                        <span class="ml-2 font-['roboto'] font-normal text-base text-red-600 py-1.5 px-1.5 bg-red-200 rounded-xl">-{{ $product->descuento }}% </span>
                    @endif
                </p>
                <p class="mt-5 text-sm">{{ $product->descripcion }}</p>
                <p class="mt-5 font-['roboto'] text-zinc-700 font-medium">Existencias: <span class="text-verde">{{ $product->stock }}</span></p>

                {{-- Agregar al Carrito--}}
                <div class="mt-4">
                        <button class="py-2 text-base px-3.5 bg-azul border border-azul rounded-lg text-white shadow hover:shadow-xl">
                            <span class="mr-2"> <i class="fa-solid fa-cart-shopping"></i> </span>
                            Agregar al carrito
                        </button>
                </div>
                
            </div>
        </div>

        {{-- Detalles JSON --}}
        <div class="w-8/12 mt-16 flex flex-col justify-center items-center font-['roboto']">
            <div class="w-full text-center">
                <h3 class="pb-1 text-2xl font-medium font-['poppins']">Detalles del Producto</h3>
                <div class="w-full h-0.5 bg-azul mx-auto mt-2"></div>
            </div>
            {{-- <div class="w-full mt-4 border border-slate-200 p-4 px-7 rounded-lg shadow"> --}}
            <div class="w-full mt-4 px-7">
                {{-- Contenedor Datos JSON --}}
                <div class="p-4 border border-slate-200 rounded-lg shadow">
                    <p class="font-medium">Datos JSON: <span class="font-normal">Dato</span></p>
                </div>
            </div>
        </div>

        {{-- Calificaciones y Comentarios --}}
        <div class="w-8/12 mt-14 flex flex-col font-['roboto']">
            <div class="text-center">
                <h3 class="pb-1 text-2xl font-medium font-['poppins']">Comentarios y Reseñas</h3>
                <div class="w-full h-0.5 bg-azul mx-auto mt-2"></div>
            </div>
            {{-- Filtros --}}
            <div class="mt-5 mx-1 px-6 flex justify-between justify-center items-center text-lg">
                <h4>Todos los comentarios <span class="text-sm text-zinc-400">(451)</span></h4>
                <form action="#">
                    <select name="filtro" id="" class="text-sm">
                        <option value="mayor-menor">Mas recientes</option>
                        <option value="mayor-menor">Menos recientes</option>
                    </select>
                </form>
            </div>

            {{-- Agregar nuevo comentario --}}
            <div class="mt-5 mx-7">
                @guest
                    <a href="/login" class="hover:text-azul m-2">
                        Por favor, inicia sesión para escribir un comentario
                    </a>
                @endguest

                @auth
                    <form action="#" method="POST">
                        @csrf
                        <div class="flex flex-col">
                            <label for="comentario">Ingresa un nuevo comentario</label>
                            <textarea 
                                name="comentario" 
                                id="comentario" 
                                cols="30" 
                                rows="3"
                                class="mt-2 rounded-lg"
                            ></textarea>
                        </div>
                        <input type="button"
                            value="Enviar"
                            class="mt-2 py-1.5 px-4 bg-azul border border-azul rounded-lg text-white shadow hover:shadow-xl"
                        >
                    </form>
                @endauth
            </div>

            {{-- Container Comentarios --}}
            <div class="mt-6 mb-5 px-7 flex flex-col gap-4">

                {{-- Comentario 1 --}}
                <div class="p-5 border border-gray-200 rounded-lg shadow">
                    {{-- Estrellas --}}
                    <p class="text-azul">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </p>
                    {{-- Nombre Usuario --}}
                    <p class="mt-2 text-lg font-medium">Nombre Usuario</p>
                    {{-- Titulo comentario --}}
                    <p class="mt-2 text-zinc-700">Titulo comentario</p>
                    {{-- Comentario --}}
                    <p class="mt-1.5 px-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui in delectus consectetur consequuntur pariatur ipsa fugiat eligendi reiciendis illo, quod consequatur velit perferendis? Quo nisi omnis ullam aliquid quasi impedit?
                    Nihil fugit eligendi repudiandae nam natus porro earum rem dignissimos, accusantium mollitia, doloribus amet exercitationem, ipsam cum reprehenderit.</p>
                    {{-- Fecha creacion --}}
                    <p class="mt-2.5 text-sm text-zinc-400">Publicado el 20/10/22</p>
                </div>

                {{-- Comentario 2 --}}
                <div class="p-5 border border-gray-200 rounded-lg shadow">
                    {{-- Estrellas --}}
                    <p class="text-azul">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </p>
                    {{-- Nombre Usuario --}}
                    <p class="mt-2 text-lg font-medium">Nombre Usuario</p>
                    {{-- Titulo comentario --}}
                    <p class="mt-2 text-zinc-700 px-3">Titulo comentario</p>
                    {{-- Comentario --}}
                    <p class="mt-1.5 px-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui in delectus consectetur consequuntur pariatur ipsa fugiat eligendi reiciendis illo, quod consequatur velit perferendis? Quo nisi omnis ullam aliquid quasi impedit?
                    Nihil fugit eligendi repudiandae nam natus porro earum rem dignissimos, accusantium mollitia, doloribus amet exercitationem, ipsam cum reprehenderit. Cupiditate autem similique doloremque aperiam recusandae blanditiis illum magnam quidem eos omnis!
                    Ratione deserunt rerum deleniti autem perferendis, corporis cumque minus quo facere, minima odit veritatis iure, libero animi quia? Aliquid optio dignissimos, dolorem necessitatibus nostrum neque commodi incidunt voluptatibus ex ut.</p>
                    {{-- Fecha creacion --}}
                    <p class="mt-2.5 text-sm text-zinc-400">Publicado el 20/10/22</p>
                </div>
            </div>
            {{-- Paginacion --}}
            <div class="text-center">
                <button class="py-2 px-4 bg-azul border border-azul rounded-lg text-white shadow hover:shadow-xl">Cargar más comentarios</button>
            </div>
        </div>
        
@endsection
