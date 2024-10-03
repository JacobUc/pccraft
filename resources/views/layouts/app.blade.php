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
        @vite('resources/js/app.js') {{-- Para Flowbite --}}
    </head>

    <body class="bg-white">

        <header class="p-5 border-b bg-white shadow">
            <div class="max-w-screen-lg container mx-auto flex justify-between items-center font-['roboto'] font-medium text-sm">
                <a href="{{ route('home') }}">
                    <img class="w-16" src="{{ asset('img/logo.png') }}" alt="Imagen Logo">
                </a>

                {{-- Navbar --}}
                <nav class="flex justify-between gap-16">
                    <a href="#">Productos</a>
                    <a href="#">Nosotros</a>
                    <a href="{{ route('faqs.index') }}">Soporte</a>
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
                        <button type="submit" class="ml-1 bg-azul rounded-xl shadow-lg">
                            <i class="fa-solid fa-magnifying-glass p-2 text-white"></i>
                        </button>
                    </form>
                </div>

                {{-- Menú de usuario --}}
                <div class="relative">
                    @guest
                    {{-- Menú para usuarios no autenticados --}}
                    <button id="user-menu-button" class="flex items-center text-gray-700 hover:text-gray-900 focus:outline-none">
                        <i class="fa-lg fa-regular fa-user cursor-pointer"></i>
                    </button>
                    <div id="user-menu" class="hidden absolute right-0 mt-2 w-40 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                        <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Log In</a>
                        <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Register</a>
                    </div>
                    @endguest

                    @auth
                    {{-- Menú para usuarios autenticados --}}
                    <button id="auth-menu-button" class="flex items-center text-gray-700 hover:text-gray-900 focus:outline-none">
                        <i class="fa-lg fa-regular fa-user cursor-pointer"></i>
                    </button>
                    
                    <div id="auth-menu" class="hidden absolute right-0 mt-2 w-40 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                    {{-- 
<a href="{{ route('perfil') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Perfil</a>
<a href="{{ route('pedidos') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Pedido</a>
--}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Salir</button>
                        </form>
                    </div>
                    @endauth
                </div>

                <div class="">
                    <a href="#"> 
                        <i class="fa-solid fa-cart-shopping fa-lg cursor-pointer"></i>
                    </a>
                </div>
            </div>
        </header>

        <main class="mx-auto font-['poppins']">
            @yield('content')
        </main>

        <footer class="bg-negro text-center p-7 pb-10 text-xs text-white font-['poppins']">
             
            <div class="flex justify-center ">
                <img src="{{ asset('img/logo-sf.png') }}" 
                    alt="Imagen Logo"
                    class="w-24 mt-2 mb-9"
                >
            </div>
            
            {{-- 3 columnas Redes y datos --}}
            <div class="flex flex-row justify-center text-left gap-10">
                <ul class="list-disc w-40">
                    {{-- !Actualizar links --}}
                    <li class="mb-2"> <a href="#">Configurar PC</a> </li> 
                    <li class="mb-2"> <a href="#">Productos</a> </li>
                    <li class="mb-2"> <a href="#">Nosotros</a> </li>
                    <li class="mb-2"> <a href="{{ route('faqs.index') }}">Soporte</a> </li>
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
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Desplegar menú para usuarios no autenticados
                const userMenuButton = document.getElementById('user-menu-button');
                const userMenu = document.getElementById('user-menu');

                if (userMenuButton) {
                    userMenuButton.addEventListener('click', function () {
                        userMenu.classList.toggle('hidden');
                    });
                }

                // Desplegar menú para usuarios autenticados
                const authMenuButton = document.getElementById('auth-menu-button');
                const authMenu = document.getElementById('auth-menu');

                if (authMenuButton) {
                    authMenuButton.addEventListener('click', function () {
                        authMenu.classList.toggle('hidden');
                    });
                }
            });
        </script>
    </body>
</html>
