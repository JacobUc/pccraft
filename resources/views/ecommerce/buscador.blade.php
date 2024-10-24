@extends('layouts.app')

@section('title', 'Buscador')

@section('content')
    <div class="w-full flex justify-center bg-stone-50">
        <div class="w-11/12 mt-5 mb-8 flex justify-center gap-4">

            {{-- Seccion de Filtros --}}
            <div class="w-2/12 max-h-fit pt-3 px-6 pb-7 bg-white border-2 rounded-lg shadow-lg text-sm">
                {{-- Formulario Filtros --}}
                <div class="mt-2">
                    <h2 class="text-2xl text-azul font-semibold">Filtros</h2>
                    <form method="GET" id="filterForm">
                        {{-- Ordenar --}}
                        <div class="mt-1.5 flex flex-col gap-2">
                            <label for="order-by" class="text-lg font-medium">Ordenar por</label>
                            <select name="order-by" 
                                id="order-by" 
                                class="text-xs text-neutral-800 rounded" 
                                onchange="document.getElementById('filterForm').submit();">

                                @if ( empty( request('order-by') ) || is_null( request('order-by') ) )
                                    <option class="text-neutral-500" value="" selected disabled>-- Seleccionar filtro --</option>
                                @endif
                                <option class="text-black" value="cheaper" {{ request('order-by') == 'cheaper' ? 'selected' : '' }} >Menor a mayor precio</option>
                                <option class="text-black" value="more-expensive" {{  request('order-by') == 'more-expensive' ? 'selected' : '' }}>Mayor a menor precio</option>
                                <option class="text-black" value="newest" {{ request('order-by') == 'newest' ? 'selected' : '' }}>Más recientes</option>
                                <option class="text-black" value="lessnew" {{ request('order-by') == 'lessnew' ? 'selected' : '' }}>Menos recientes</option>
                            </select>
                        </div>

                        {{-- Rango de Precio --}}
                        <div class="mt-3 flex flex-col">
                            <h3 class="text-lg font-medium">Precio</h3>
                            <div class="mt-0.5 flex flex-col">
                                <label for="min-price">Precio Mínimo</label>
                                <input class="mt-0.5 text-xs rounded" type="number" name="min-price" id="min-price" min="0" value="{{ $minPrice }}">
                            </div>
                            <div class="mt-1.5 flex flex-col">
                                <label for="max-price">Precio Máximo</label>
                                <input class="mt-0.5 py-2 text-xs rounded" type="number" name="max-price" id="max-price" min="0" value="{{ $maxPrice }}">
                            </div>
                        </div>

                        {{--  !Campo de búsqueda por nombre/modelo --}}
                        <input type="hidden" name="search" value="{{ request('search') }}">
                        
                        {{-- Boton Aplicar filtros y Reset Filtros--}}
                        <div class="mt-4 flex flex-col justify-center gap-3">
                            <button type="submit" class="py-2 px-4 bg-white text-sm border border-azul rounded-lg text-azul shadow hover:shadow-xl duration-500 hover:bg-azul hover:text-white">
                                <i class="fa-solid fa-filter"></i>
                                <span>Aplicar Filtros</span>
                            </button>
                            <a href="{{route('productos.buscador')}}" class="py-2 px-4 bg-white text-sm text-center border border-azul rounded-lg text-azul shadow duration-500 hover:shadow-xl hover:bg-azul hover:text-white">
                                <i class="fa-solid fa-rotate-left"></i>
                                <span>Reestablecer Filtros</span>
                            </a>
                        </div>
                    </form>
                </div>

                {{-- Categorias --}}
                <div class="mt-6 flex flex-col">
                    <h2 class="mb-2.5 text-xl font-medium">Categorías</h2>
                    <div class="flex flex-col text-center gap-3">

                        <a href="{{ route('productos.categorias', 'procesador') }}" class="py-2.5 px-4 border border-azul rounded-lg text-azul shadow shadow-neutral-300 duration-500 hover:shadow hover:shadow-neutral-800 hover:bg-azul hover:text-white
                            {{ url()->current() === route('productos.categorias', 'procesador') ? 'bg-azul text-white font-medium' : '' }}"
                        >Procesadores</a>

                        <a href="{{ route('productos.categorias', 'tarjeta de video') }}" class="py-2.5 px-4 border border-azul rounded-lg text-azul shadow shadow-neutral-300 duration-500 hover:shadow hover:shadow-neutral-800 hover:bg-azul hover:text-white {{ url()->current() === route('productos.categorias', 'tarjeta de video') ? 'bg-azul text-white font-medium' : '' }}">Tarjetas de Vídeo</a>

                        <a href="{{ route('productos.categorias', 'tarjeta madre') }}" class="py-2.5 px-4 border border-azul rounded-lg text-azul shadow shadow-neutral-300 duration-500 hover:shadow hover:shadow-neutral-800 hover:bg-azul hover:text-white {{ url()->current() === route('productos.categorias', 'tarjeta madre') ? 'bg-azul text-white font-medium' : '' }}">Tarjetas Madre</a>

                        <a href="{{ route('productos.categorias', 'memoria ram') }}" class="py-2.5 px-4 border border-azul rounded-lg text-azul shadow shadow-neutral-300 duration-500 hover:shadow hover:shadow-neutral-800 hover:bg-azul hover:text-white {{ url()->current() === route('productos.categorias', 'memoria ram') ? 'bg-azul text-white font-medium' : '' }}">Memorias RAM</a>

                        <a href="{{ route('productos.categorias', 'disco duro') }}" class="py-2.5 px-4 border border-azul rounded-lg text-azul shadow shadow-neutral-300 duration-500 hover:shadow hover:shadow-neutral-800 hover:bg-azul hover:text-white {{ url()->current() === route('productos.categorias', 'disco duro') ? 'bg-azul text-white font-medium' : '' }}">Discos Duros</a>

                        <a href="{{ route('productos.categorias', 'gabinete') }}" class="py-2.5 px-4 border border-azul rounded-lg text-azul shadow shadow-neutral-300 duration-500 hover:shadow hover:shadow-neutral-800 hover:bg-azul hover:text-white {{ url()->current() === route('productos.categorias', 'gabinete') ? 'bg-azul text-white font-medium' : '' }}">Gabinetes</a>

                        <a href="{{ route('productos.categorias', 'accesorios') }}" class="py-2.5 px-4 border border-azul rounded-lg text-azul shadow shadow-neutral-300 duration-500 hover:shadow hover:shadow-neutral-800 hover:bg-azul hover:text-white {{ url()->current() === route('productos.categorias', 'accesorios') ? 'bg-azul text-white font-medium' : '' }}">Accesorios</a>

                        <a href="{{ route('productos.categorias', 'fuente de poder') }}" class="py-2.5 px-4 border border-azul rounded-lg text-azul shadow shadow-neutral-300 duration-500 hover:shadow hover:shadow-neutral-800 hover:bg-azul hover:text-white {{ url()->current() === route('productos.categorias', 'fuente de poder') ? 'bg-azul text-white font-medium' : '' }}">Fuentes de poder</a>

                        <a href="{{ route('productos.categorias', 'enfriamiento') }}" class="py-2.5 px-4 border border-azul rounded-lg text-azul shadow shadow-neutral-300 duration-500 hover:shadow hover:shadow-neutral-800 hover:bg-azul hover:text-white {{ url()->current() === route('productos.categorias', 'enfriamiento') ? 'bg-azul text-white font-medium' : '' }}">Enfriamiento</a>
                        
                    </div>
                </div>

            </div>
        
            {{-- Seccion de Resultados --}}
            <div class="w-10/12 ml-5 ">
                @if ($productToSearch)
                    <div class="mb-7">
                        <h1 class="text-2xl font-semibold text-azul">{{$products->total()}} Resultados para "{{$productToSearch}}"</h1>
                    </div>
                @endif
                
                {{-- Verificar si hay productos para mostrar --}}
                @if ( count( $products ) === 0 )
                    {{-- Si no hay productos --}}
                    <div class="mt-24 flex flex-col gap-6 items-center justify-center">
                        <h3 class="font-medium text-xl text-neutral-500">No hay productos para mostrar</h3>
                        <img src="{{asset('img/no_results.png')}}" 
                            alt="Imagen Sin Resultados"
                            class="h-[28rem]">
                    </div>
                @else
                    {{-- Lista de productos --}}
                    <div class="w-full py-6 px-8 grid grid-cols-4 gap-6 bg-white border-2 border-gray-200 rounded-lg shadow-lg">
                        {{-- Mostrar los productos --}}
                        @foreach ($products as $product)
                            <div class="w-[17rem] pt-2 pb-5 px-3 border border-neutral-200 rounded-lg text-center font-medium shadow duration-300 hover:shadow-lg hover:shadow-neutral-300">
                                {{-- Imagen --}}
                                <div class="px-1 flex align-items items-center">
                                    <a href="{{ '/productos/' . $product->ID_producto }}" class="w-full h-[13rem]">
                                        {{-- !Formatear imagen --}}
                                        <img src="{{ asset('storage/' . json_decode($product->url_photo, true)[0] ) }}"
                                            class="w-full h-full object-contain  rounded-xl"
                                            alt="Imagen Producto">
                                    </a>
                                </div>
                                {{-- Info Producto --}}
                                <div>
                                    <h2 class="mt-3 mb-1 leading-relaxed">
                                        <a href="{{ '/productos/' . $product->ID_producto }}">
                                            <span class="duration-300 hover:text-azul">{{$product->nombre}}</span>
                                        </a>
                                    </h2>
                                    <p class="mb-1.5 text-verde font-normal">{{ $product->category->nombre_categoria }}</p>
                                    {{-- !Formatear precio --}}
                                    <div class="mb-3">
                                        <p class="mb-0.5 font-['roboto'] text-base text-azul">
                                            ${{ number_format($product->precioFinal, 2, '.', ',') }}
                                        </p>
                                        @if ($product->descuento > 0)
                                            <p class="font-['roboto'] text-sm text-slate-400">
                                                <span class="line-through">${{ number_format($product->precio, 2, '.', ',') }}</span>
                                            
                                                <span class="py-0.5 px-1.5 font-['roboto'] font-medium text-xs text-red-600 bg-red-200 rounded-lg">
                                                    -{{ $product->descuento }}%
                                                </span>
                                            </p>
                                        @endif
                                    </div>
                                </div>

                                {{-- Agregar al Carrito --}}
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $product->ID_producto }}">
                                    <input type="hidden" name="nombre" value="{{ $product->nombre }}">
                                    <input type="hidden" name="modelo" value="{{ $product->modelo }}">
                                    <input type="hidden" name="fabricante" value="{{ $product->fabricante }}">
                                    <input type="hidden" name="descuento" value="{{ $product->descuento }}">
                                    <input type="hidden" name="precio" value="{{ $product->precio }}">
                                    <input type="hidden" name="cantidad" value="1"> 
                                    <input type="hidden" name="url_photo[]" value="{{ $product->url_photo }}">
                                    
                                    {{-- Mostrar errores de validación --}}
                                    @error('id')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                    @error('nombre')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                    @error('modelo')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                    @error('fabricante')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                    @error('descuento')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                    @error('precio')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                    @error('cantidad')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                    @error('url_photo')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror

                                    <button type="submit" class="w-48 py-2.5 bg-white text-sm text-base font-normal border border-azul rounded-lg text-azul shadow-md shadow-neutral-400 duration-500 hover:bg-azul hover:text-white hover:shadow-md hover:shadow-neutral-500">
                                        <span class="mr-2"><i class="fa-solid fa-cart-shopping"></i></span>
                                        Agregar al carrito
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @endif

                {{-- Menu Paginacion --}}
                <div class="mt-8">
                    {{-- {{ $products->links() }} --}}
                    {{ $products->appends( array_filter([
                        'search' => request('search') ?? '', // Agregar solo si $productToSearch tiene un valor.
                        'order-by' => request('order-by') ?? '', // Agregar solo si $orderBy tiene un valor.
                        'min-price' => request('min-price') ?? '',
                        'max-price' => request('max-price') ?? ''
                    ]) ) }}
                </div>
            </div>

        </div>
    </div>
@endsection