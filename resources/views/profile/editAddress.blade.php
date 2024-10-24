@extends('layouts.app')

@section('title', 'Editar Dirección')

@section('content')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Editar Dirección') }}
    </h2>
</x-slot>

<div class="flex max-w-6xl w-full mx-auto px-6 lg:px-8 space-x-6">
    <!-- Sidebar (Fijo a la izquierda) -->
    <div class="bg-white shadow sm:rounded-lg p-6 w-1/4">
        <ul class="space-y-4">
            <li>
                <a href="{{ route('profile.update') }}" class="text-gray-700 hover:underline">Volver a direcciones</a>
            </li>
        </ul>
    </div>

    <!-- Formulario de edición de dirección -->
    <div class="bg-white shadow sm:rounded-lg p-6 flex-grow">
        <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Editar Dirección</h3>

        <form method="POST" action="{{ route('profile.updateAddress', $direccion->ID_Direccion) }}">
            @csrf
            @method('PATCH')

            <!-- Ciudad -->
            <div class="mb-4">
                <label for="ciudad" class="block text-sm font-medium text-gray-700">Ciudad</label>
                <input type="text" id="ciudad" name="ciudad" value="{{ old('ciudad', $direccion->ciudad) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
            </div>

            <!-- Calle Principal -->
            <div class="mb-4">
                <label for="calle_principal" class="block text-sm font-medium text-gray-700">Calle Principal</label>
                <input type="text" id="calle_principal" name="calle_principal" value="{{ old('calle_principal', $direccion->calle_principal) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
            </div>

            <!-- Cruzamientos -->
            <div class="mb-4">
                <label for="cruzamientos" class="block text-sm font-medium text-gray-700">Cruzamientos</label>
                <input type="text" id="cruzamientos" name="cruzamientos" value="{{ old('cruzamientos', $direccion->cruzamientos) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
            </div>

            <!-- Número Exterior -->
            <div class="mb-4">
                <label for="numero_exterior" class="block text-sm font-medium text-gray-700">Número Exterior</label>
                <input type="text" id="numero_exterior" name="numero_exterior" value="{{ old('numero_exterior', $direccion->numero_exterior) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
            </div>

            <!-- Número Interior -->
            <div class="mb-4">
                <label for="numero_interior" class="block text-sm font-medium text-gray-700">Número Interior</label>
                <input type="text" id="numero_interior" name="numero_interior" value="{{ old('numero_interior', $direccion->numero_interior) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
            </div>

            <!-- Detalles -->
            <div class="mb-4">
                <label for="detalles" class="block text-sm font-medium text-gray-700">Detalles</label>
                <textarea id="detalles" name="detalles" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3">{{ old('detalles', $direccion->detalles) }}</textarea>
            </div>

            <!-- Código Postal -->
            <div class="mb-4">
                <label for="codigo_postal" class="block text-sm font-medium text-gray-700">Código Postal</label>
                <input type="text" id="codigo_postal" name="codigo_postal" value="{{ old('codigo_postal', $direccion->codigo_postal) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
            </div>

            <!-- Botón Guardar -->
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md">
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</div>
@endsection