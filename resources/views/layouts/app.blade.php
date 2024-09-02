<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('styles') {{-- Reserva espacio para agregar hojas de estilo que sean diferentes, que no se requieran en todas las vistas --}}
        <title>PCCraft - @yield('title')</title>

        {{-- Fuentes --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

        @vite('resources/css/app.css')
        @vite('resources/js/app.js') {{-- Para el dropzone --}}
    </head>

    <body class="bg-gray-100">

        <header class="p-5 border-b bg-white shadow">
            <div class="max-w-screen-lg container mx-auto flex justify-between items-center font-['roboto'] font-medium text-sm">
                <a href=" {{ route('home') }} ">
                    <img class="w-16" src="{{ asset('img/logo.png') }}" alt="Imagen Logo">
                </a>

                {{-- navbvar --}}
                <nav class="flex justify-between gap-16">
                    <a href=" {{route('productos')}} ">Productos</a>
                    <a href=" {{route('nosotros')}} ">Nosotros</a>
                    <a href=" {{route('soporte')}} ">Soporte</a>
                </nav>

                <div class="flex justify-between">
                    {{-- Barra de Busqueda --}}
                    <form action="" method="get">
                        <input type="text" 
                            name="search-bar" 
                            id="search-bar"
                            placeholder="Buscar componente"
                            class="w-80 h-10 rounded-lg text-sm placeholder:text-slate-400 placeholder:text-sm"
                        >
                        <button type="submit" class="ml-1 bg-azul rounded-xl shadow-lg"> {{-- !Cambiar color  --}}
                            <i class="fa-solid fa-magnifying-glass p-2 text-white"></i>
                        </button>
                    </form>
                </div>

                <div class="">
                    <i class="fa-lg fa-regular fa-user cursor-pointer"></i>
                </div>

                {{-- Revisa si un usuario esta autenticado --}}
                {{-- @auth
                    <nav class="flex gap-2 items-center">
                        <a 
                        class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold " 
                        href="{{ route('pedidos') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                            </svg>
                              
                            Crear
                        </a>
                        <a 
                        class="font-bold text-gray-600 text-sm" 
                        href="{{ route('posts.index', auth()->user()->name ) }}">
                            Hola:
                            <span class="font-normal">
                                {{ auth()->user()->username }}
                            </span>
                        </a>
                        <form method="POST" action="{{ route('pedidos') }}">
                            @csrf
                            <button type="submit" class="font-bold uppercase text-gray-600 text-sm">
                                Cerrar Sesion
                            </button>
                        </form>
                    </nav>
                @endauth --}}

                {{-- @guest
                    <nav class="flex gap-2 items-center">
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('pedidos') }}">Login</a>
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('pedidos') }}">Crear Cuenta</a>
                        <a href="">Caquita</a>
                    </nav>
                @endguest --}}

                <div class="">
                    <i class="fa-solid fa-cart-shopping fa-lg cursor-pointer"></i>
                </div>

            </div>
        </header>

        <main class="mx-auto font-['poppins']">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('titulo-h2')
            </h2>
            @yield('content')
        </main>

        <footer class="bg-negro text-center p-7 pb-10 text-xs text-white font-['poppins']">
             
            <div class="flex justify-center ">
                <img src="{{asset('img/logo-sf.png')}}" 
                    alt="Imagen Logo"
                    class="w-24 mt-2 mb-9"
                >
            </div>
            
            {{-- 3 columnas Redes y datos--}}
            <div class="flex flex-row justify-center text-left gap-10">
                <ul class="list-disc w-40">
                    {{-- !Actualizar links --}}
                    <li class="mb-2"> <a href="#">Configurar PC</a> </li> 
                    <li class="mb-2"> <a href="#">Productos</a> </li>
                    <li class="mb-2"> <a href="#">Nosotros</a> </li>
                    <li class="mb-2"> <a href="#">Soporte</a> </li>
                </ul>
                
                <ul class="w-40 text-center">
                    <li class="mb-2"> <i class="fa-solid fa-phone"></i> 999 999 999 </li>
                    <li class="mb-2"> <i class="fa-regular fa-envelope"></i> contact@pccraft.com </li>
                </ul>
                
                <div class="w-40">
                    <p class="ml-2 mb-0.5"><i class="fa-solid fa-location-dot"></i> Calle 38F</p>
                    <p class="ml-5 mb-0.5">Fracc. Las Américas</p>
                    <p class="ml-5 mb-0.5">CP 97301</p>
                    <p class="ml-5 mb-0.5">Mérida, Yucatán</p>
                </div>
            </div>
            
            {{-- Logos redes --}}
            <div class="flex flex-row justify-center gap-4 mt-1 mb-6">
                <a href="#"> <i class="fa-brands fa-whatsapp fa-2x"></i> </a>
                <a href="#"> <i class="fa-brands fa-facebook fa-2x"></i> </a>
                <a href="#"> <i class="fa-brands fa-square-x-twitter fa-2x"></i> </a>
            </div>

            <div class="mt-7">
                <p>PCCraft - Todos los derechos reservados {{ now()->year }}</p>
            </div>
        </footer>

        <script src="https://kit.fontawesome.com/5a52c5581a.js" crossorigin="anonymous"></script>
    </body>
</html>
