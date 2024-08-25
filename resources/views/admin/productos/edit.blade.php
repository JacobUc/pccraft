@extends('admin.layouts.template')

@section('title', 'Editar Producto')

@section('content_header')
    <h1>Editar Producto</h1>
@endsection

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">Datos Generales</h2>
        <a href="{{ route('admin-productos') }}" class="text-red-500">Cancelar</a>
    </div>

    <form action="{{ route('productos.update', $product->ID_producto) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="nombre" class="block text-gray-700">Nombre del producto</label>
                <input type="text" id="nombre" name="nombre" class="w-full p-2 border border-gray-300 rounded" value="{{ $product->nombre }}">
            </div>
            
            <div>
                <label for="ID_Categoria" class="block text-gray-700">Categoría</label>
                <select id="ID_Categoria" name="ID_Categoria" class="w-full p-2 border border-gray-300 rounded">
                    @foreach($categories as $categoria)
                        <option value="{{ $categoria->ID_Categoria }}" {{ $product->ID_Categoria == $categoria->ID_Categoria ? 'selected' : '' }}>
                            {{ $categoria->nombre_categoria }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div>
                <label for="modelo" class="block text-gray-700">Modelo</label>
                <input type="text" id="modelo" name="modelo" class="w-full p-2 border border-gray-300 rounded" value="{{ $product->modelo }}">
            </div>
            
            <div>
                <label for="precio" class="block text-gray-700">Precio</label>
                <input type="number" id="precio" name="precio" step="0.01" class="w-full p-2 border border-gray-300 rounded" value="{{ $product->precio }}">
            </div>

            <div>
                <label for="fabricante" class="block text-gray-700">Fabricante</label>
                <input type="text" id="fabricante" name="fabricante" class="w-full p-2 border border-gray-300 rounded" value="{{ $product->fabricante }}">
            </div>

            <div>
                <label for="stock" class="block text-gray-700">Stock</label>
                <input type="number" id="stock" name="stock" class="w-full p-2 border border-gray-300 rounded" value="{{ $product->stock }}">
            </div>

            <div>
                <label for="descuento" class="block text-gray-700">Descuento (%)</label>
                <input type="number" id="descuento" name="descuento" step="0.01" class="w-full p-2 border border-gray-300 rounded" value="{{ $product->descuento }}">
            </div>
        </div>

        <div class="mb-6">
            <label for="descripcion" class="block text-gray-700">Descripción</label>
            <textarea id="descripcion" name="descripcion" class="w-full p-2 border border-gray-300 rounded">{{ $product->descripcion }}</textarea>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700">Agregar imagen</label>
            <div class="border-2 border-dashed p-4 flex justify-center items-center">
                <input type="file" name="images[]" multiple class="w-full">
            </div>
            @if ($product->imagenes)
                <div class="mt-4 grid grid-cols-3 gap-4">
                    @foreach ($product->imagenes as $imagen)
                        <div class="relative">
                            <img src="{{ asset('storage/' . $imagen) }}" class="w-full h-auto">
                            <button type="button" class="absolute top-0 right-0 bg-red-500 text-white rounded-full px-2 py-1">X</button>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="mb-6">
            <label for="especificacionJSON" class="block text-gray-700">Especificaciones (JSON)</label>
            <input type="file" id="especificacionJSON" name="especificacionJSON" class="w-full p-2 border border-gray-300 rounded">
            @if ($product->especificacionJSON)
                <p class="mt-2">{{ basename($product->especificacionJSON) }}</p>
            @endif
        </div>

        <div class="flex justify-between">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar Producto</button>
            <button type="submit" form="delete-product-form" class="bg-red-500 text-white px-4 py-2 rounded">Eliminar Producto</button>
        </div>
    </form>

    <form id="delete-product-form" action="{{ route('productos.destroy', $product->ID_producto) }}" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</div>
@endsection
