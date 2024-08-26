@extends('admin.layouts.template')

@section('title', 'Crear Producto')

@section('content_header')
    <h1>Crear Nuevo Producto</h1>
@endsection

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">Datos Generales</h2>
        <a href="{{ route('admin-productos') }}" class="text-red-500">Cancelar</a>
    </div>

    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="nombre" class="block text-gray-700">Nombre del producto</label>
                <input type="text" id="nombre" name="nombre" class="w-full p-2 border border-gray-300 rounded" value="{{ old('nombre') }}">
            </div>
            
            <div>
                <label for="ID_Categoria" class="block text-gray-700">Categoría</label>
                <select id="ID_Categoria" name="ID_Categoria" class="w-full p-2 border border-gray-300 rounded">
                    @foreach($categories as $categoria)
                        <option value="{{ $categoria->ID_Categoria }}" {{ old('ID_Categoria') == $categoria->ID_Categoria ? 'selected' : '' }}>
                            {{ $categoria->nombre_categoria }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div>
                <label for="modelo" class="block text-gray-700">Modelo</label>
                <input type="text" id="modelo" name="modelo" class="w-full p-2 border border-gray-300 rounded" value="{{ old('modelo') }}">
            </div>
            
            <div>
                <label for="precio" class="block text-gray-700">Precio</label>
                <input type="number" id="precio" name="precio" step="0.01" class="w-full p-2 border border-gray-300 rounded" value="{{ old('precio') }}">
            </div>

            <div>
                <label for="fabricante" class="block text-gray-700">Fabricante</label>
                <input type="text" id="fabricante" name="fabricante" class="w-full p-2 border border-gray-300 rounded" value="{{ old('fabricante') }}">
            </div>

            <div>
                <label for="stock" class="block text-gray-700">Stock</label>
                <input type="number" id="stock" name="stock" class="w-full p-2 border border-gray-300 rounded" value="{{ old('stock') }}">
            </div>

            <div>
                <label for="descuento" class="block text-gray-700">Descuento (%)</label>
                <input type="number" id="descuento" name="descuento" step="0.01" class="w-full p-2 border border-gray-300 rounded" value="{{ old('descuento') }}">
            </div>
        </div>

        <div class="mb-6">
            <label for="descripcion" class="block text-gray-700">Descripción</label>
            <textarea id="descripcion" name="descripcion" class="w-full p-2 border border-gray-300 rounded">{{ old('descripcion') }}</textarea>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700">Agregar imagen</label>
            <div class="border-2 border-dashed p-4 flex justify-center items-center">
                <input type="file" name="url_photo" multiple class="w-full">
            </div>
        </div>

        <div class="mb-6">
            <label for="especificacionJSON" class="block text-gray-700">Especificaciones (JSON)</label>
            <input type="file" id="especificacionJSON" name="especificacionJSON" class="w-full p-2 border border-gray-300 rounded">
        </div>

        <div class="flex justify-between">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Crear Producto</button>
        </div>
    </form>
</div>
@endsection
