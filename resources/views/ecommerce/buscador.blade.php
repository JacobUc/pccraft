@extends('layouts.app')

@section('title', 'Buscador')

@section('content')
    <div class="w-full flex justify-center bg-stone-50">
        <div class="w-11/12 mt-8 mb-4 flex justify-center gap-2">

            {{-- Seccion de Filtros --}}
            <div class="w-2/12 h-[59rem] pt-5 px-5 pb-5 bg-white border-2 rounded-lg shadow-lg text-sm">
                <h3 class="text-2xl text-azul font-semibold">Filtros</h3>
                {{-- !Formulario Filtros --}}
                <div class="mt-4">
                    <form method="GET">

                        {{-- Rango de Precio --}}
                        <div class="mt-4 flex flex-col">
                            <label for="price-range" class="text-lg">Precio</label>
                            <label for="min-price">Precio Mínimo</label>
                            <input class="text-sm" type="number" name="min-price" id="min-price" min="0" value="{{ $minPrice }}">
                            <label for="max-price">Precio Máximo</label>
                            <input class="text-sm" type="number" name="max-price" id="max-price" min="0" value="{{ $maxPrice }}">
                            {{-- <input type="range" name="price-range" id="price-range" min="0" max="2000"> --}}
                        </div>

                        {{-- Ordenar --}}
                        <div class="mt-4">
                            <label for="" class="text-lg">Ordenar por:</label>
                            <select name="order-by" id="" class="text-sm">
                                <option value="" selected disabled>-- Seleccionar filtro --</option>
                                <option value="cheaper" {{ $orderBy && $orderBy == 'cheaper' ? 'selected' : '' }}>Menor a mayor precio</option>
                                <option value="more-expensive" {{ $orderBy && $orderBy == 'more-expensive' ? 'selected' : '' }}>Mayor a menor precio</option>
                                <option value="newest" {{ $orderBy && $orderBy == 'newest' ?? 'selected' }}>Más recientes</option>
                                <option value="lessnew" {{ $orderBy && $orderBy == 'lessnew' ?? 'selected' }}>Menos recientes</option>
                            </select>
                        </div>

                        {{--  !Campo de búsqueda por nombre/modelo --}}
                        <input type="hidden" name="search" value="{{ request('search') }}">
                        
                        {{-- Boton Aplicar filtros --}}
                        <div class="mt-4 flex flex-col justify-center gap-3">
                            <button type="submit" class="py-2 px-4 bg-white text-base border border-azul rounded-lg text-azul shadow hover:shadow-xl hover:bg-azul hover:text-white">
                                <i class="fa-solid fa-filter"></i>
                                <span>Aplicar Filtros</span>
                            </button>
                            <a href="{{route('productos.buscador')}}" class="py-2 px-4 bg-white text-base border border-azul rounded-lg text-azul shadow hover:shadow-xl hover:bg-azul hover:text-white">
                                <i class="fa-solid fa-rotate-left"></i>
                                <span>Reestablecer Filtros</span>
                            </a>
                        </div>
                    </form>
                </div>

                {{-- Categorias --}}
                <div class="mt-6 flex flex-col">
                    <label for="" class="text-lg mb-2">Categorías</label>
                    <div class="flex flex-col text-center gap-2.5">

                        <a href="{{ route('productos.categorias', 'procesador') }}" class="py-2 px-4 bg-white text-base border border-azul rounded-lg text-azul shadow hover:shadow-lg hover:bg-azul hover:text-white {{ url()->current() === route('productos.categorias', 'procesador') ? 'bg-verde text-white' : 'bg-white' }}">Procesadores</a>

                        <a href="{{ route('productos.categorias', 'tarjeta de video') }}" class="py-2 px-4 bg-white text-base border border-azul rounded-lg text-azul shadow hover:shadow-lg hover:bg-azul hover:text-white {{ url()->current() === route('productos.categorias', 'tarjeta de video') ? 'bg-verde text-white' : 'bg-white' }}">Tarjetas Gráficas</a>

                        <a href="{{ route('productos.categorias', 'tarjeta madre') }}" class="py-2 px-4 bg-white text-base border border-azul rounded-lg text-azul shadow hover:shadow-lg hover:bg-azul hover:text-white {{ url()->current() === route('productos.categorias', 'tarjeta madre') ? 'bg-verde text-white' : 'bg-white' }}">Tarjetas Madre</a>

                        <a href="{{ route('productos.categorias', 'memoria ram') }}" class="py-2 px-4 bg-white text-base border border-azul rounded-lg text-azul shadow hover:shadow-lg hover:bg-azul hover:text-white {{ url()->current() === route('productos.categorias', 'memoria ram') ? 'bg-verde text-white' : 'bg-white' }}">Memorias RAM</a>

                        <a href="{{ route('productos.categorias', 'disco duro') }}" class="py-2 px-4 bg-white text-base border border-azul rounded-lg text-azul shadow hover:shadow-lg hover:bg-azul hover:text-white {{ url()->current() === route('productos.categorias', 'disco duro') ? 'bg-verde text-white' : 'bg-white' }}">Discos Duros</a>

                        <a href="{{ route('productos.categorias', 'gabinete') }}" class="py-2 px-4 bg-white text-base border border-azul rounded-lg text-azul shadow hover:shadow-lg hover:bg-azul hover:text-white {{ url()->current() === route('productos.categorias', 'gabinete') ? 'bg-verde text-white' : 'bg-white' }}">Gabinetes</a>

                        <a href="{{ route('productos.categorias', 'accesorios') }}" class="py-2 px-4 bg-white text-base border border-azul rounded-lg text-azul shadow hover:shadow-lg hover:bg-azul hover:text-white {{ url()->current() === route('productos.categorias', 'accesorios') ? 'bg-verde text-white' : 'bg-white' }}">Accesorios</a>

                        <a href="{{ route('productos.categorias', 'fuente de poder') }}" class="py-2 px-4 bg-white text-base border border-azul rounded-lg text-azul shadow hover:shadow-lg hover:bg-azul hover:text-white {{ url()->current() === route('productos.categorias', 'fuente de poder') ? 'bg-verde text-white' : 'bg-white' }}">Fuentes de poder</a>

                        <a href="{{ route('productos.categorias', 'enfriamiento') }}" class="py-2 px-4 bg-white text-base border border-azul rounded-lg text-azul shadow hover:shadow-lg hover:bg-azul hover:text-white {{ url()->current() === route('productos.categorias', 'enfriamiento') ? 'bg-verde text-white' : 'bg-white' }}">Enfriamiento</a>
                        
                    </div>
                </div>

            </div>
        
            {{-- Seccion de Resultados --}}
            <div class="w-10/12 ml-7 mb-10">

                @if ($productToSearch)
                    <div class="mb-7">
                        <h1 class="text-2xl font-semibold text-azul">{{$products->total()}} Resultados para "{{$productToSearch}}"</h1>
                    </div>
                @endif
                {{-- Lista de productos --}}
                {{-- <div class="w-full py-10 px-8 flex flex-row flex-wrap justify-center text-center gap-6 bg-white border-2 border-gray-200 rounded-lg shadow-lg"> --}}
                <div class="w-full py-6 px-8 grid grid-cols-4 gap-6 bg-white border-2 border-gray-200 rounded-lg shadow-lg">
                    {{-- Mostrar los productos --}}
                    @foreach ($products as $product)
                        <div class="w-[17rem] pt-2 pb-5 px-3 border border-gray-200 rounded-lg text-center font-medium shadow-xl">
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
                                        <span class=" hover:text-azul">{{$product->nombre}}</span>
                                    </a>
                                </h2>
                                <p class="mb-1.5 text-verde font-normal">{{ $product->category->nombre_categoria }}</p>
                                {{-- !Formatear precio --}}
                                <div class="mb-3">
                                    <p class="mb-0.5 font-['roboto'] text-lg text-azul">
                                        ${{ number_format($product->precioFinal, 2, '.', ',') }}
                                    </p>
                                    @if ($product->descuento > 0)
                                        <p class="font-['roboto'] text-sm text-slate-400">
                                            <span class="line-through">${{ number_format($product->precio, 2, '.', ',') }}</span>
                                        
                                            <span class="py-1.5 px-1.5 font-['roboto'] font-medium text-xs text-red-600 bg-red-200 rounded-lg">
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

                                <button type="submit" class="py-2 px-4 bg-white text-base font-normal border border-azul rounded-lg text-azul shadow shadow-blue-300 duration-500 hover:shadow-xl hover:bg-azul hover:text-white">
                                    <span class="mr-2"><i class="fa-solid fa-cart-shopping"></i></span>
                                    Agregar al carrito
                                </button>
                            </form>
                        </div>
                    @endforeach

                </div>


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