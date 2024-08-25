@extends('admin.layouts.template')

@section('title', 'Productos')

@section('content_header')
    <div class="flex justify-between items-center">
        <h1>Productos</h1>

        <!-- Barra de búsqueda -->
        <form action="{{ route('productos.index') }}" method="GET" class="flex space-x-4">
            <input type="text" name="search" placeholder="Buscar por nombre o modelo"
                   class="border rounded-l px-4 py-2 w-64" value="{{ request('search') }}">
            <button type="submit" class="bg-blue-500 text-white rounded-r px-4 py-2">
                Buscar
            </button>
        </form>
    </div>

    <!-- Filtros -->
    <form action="{{ route('productos.index') }}" method="GET" class="flex space-x-4 mt-4">
        <div>
            <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
            <select name="fecha" id="fecha"
                    class="border rounded px-4 py-2">
                <option value="">Seleccionar</option>
                <option value="asc" {{ request('fecha') == 'asc' ? 'selected' : '' }}>Ascendente</option>
                <option value="desc" {{ request('fecha') == 'desc' ? 'selected' : '' }}>Descendente</option>
            </select>
        </div>

        <div>
            <label for="precio" class="block text-sm font-medium text-gray-700">Precio</label>
            <select name="precio" id="precio"
                    class="border rounded px-4 py-2">
                <option value="">Seleccionar</option>
                <option value="asc" {{ request('precio') == 'asc' ? 'selected' : '' }}>Ascendente</option>
                <option value="desc" {{ request('precio') == 'desc' ? 'selected' : '' }}>Descendente</option>
            </select>
        </div>

        <div>
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
            <select name="nombre" id="nombre"
                    class="border rounded px-4 py-2">
                <option value="">Seleccionar</option>
                <option value="asc" {{ request('nombre') == 'asc' ? 'selected' : '' }}>Ascendente</option>
                <option value="desc" {{ request('nombre') == 'desc' ? 'selected' : '' }}>Descendente</option>
            </select>
        </div>

        <div>
            <label for="categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
            <select name="categoria" id="categoria"
                    class="border rounded px-4 py-2">
                <option value="">Seleccionar</option>
                @foreach($categories as $category)
                    <option value="{{ $category->ID_Categoria }}" 
                        {{ request('categoria') == $category->ID_Categoria ? 'selected' : '' }}>
                        {{ $category->nombre_categoria }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2">
            Aplicar Filtros
        </button>
        <a href="{{ route('productos.index') }}" class="text-blue-500 hover:underline mt-2">
            Reset Filter
        </a>
    </form>
@endsection

@section('content')
    <p>Mostrar todos los productos</p>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Modelo</th>
                    <th>Fabricante</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Categoría</th>
                    <th>Vendidos</th>
                    <th>Fecha Agregada</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->ID_producto }}</td>
                        <td>{{ $product->nombre }}</td>
                        <td>{{ $product->modelo }}</td>
                        <td>{{ $product->fabricante }}</td>
                        <td>{{ $product->descripcion }}</td>
                        <td>{{ $product->precio }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->category->nombre_categoria }}</td>
                        <td>{{ $product->vendidos }}</td>
                        <td>{{ $product->fecha_agregada }}</td>
                        <td>
                            <!-- Botoniza por cambiar -->
                            <a href="{{ route('productos.edit', $product->ID_producto) }}" class="btn btn-warning btn-sm">Editar</a>

                            <form action="{{ route('productos.destroy', $product->ID_producto) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11">No hay productos disponibles.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
