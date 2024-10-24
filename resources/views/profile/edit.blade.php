@extends('layouts.app')

@section('title', 'Mi Cuenta')

@section('content')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Mi Cuenta') }}
    </h2>
</x-slot>

<!-- Aumentar el ancho máximo del contenedor principal -->
<div class="flex max-w-6xl w-full mx-auto px-6 lg:px-8 space-x-6">
    <!-- Sidebar (Fijo a la izquierda) -->
    <div class="bg-white shadow sm:rounded-lg p-6 w-1/4">
        <ul class="space-y-4">
            <li>
                <a href="{{ route('profile.update') }}" class="text-gray-700 hover:underline">Editar datos</a>
            </li>
            <li>
                <a href="#" class="text-gray-700 hover:underline">Ver compras</a>
            </li>
            <li>
               <!-- Formulario para cerrar sesión -->
               <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-gray-700 hover:underline">Cerrar sesión</button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Vista del perfil (contenido no editable) -->
    <div class="bg-white shadow sm:rounded-lg p-6 flex-grow">
        <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Información Básica</h3>

        <!-- Nombre (No editable) -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Nombre</label>
            <p class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 bg-gray-100">
                {{ auth()->user()->name }}
            </p>
        </div>

        <!-- Apellidos (No editable) -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Apellidos</label>
            <p class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 bg-gray-100">
                {{ auth()->user()->last_name }}
            </p>
        </div>

        <!-- Correo Electrónico (No editable) -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
            <p class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 bg-gray-100">
                {{ auth()->user()->email }}
            </p>
        </div>

        <!-- Teléfono Celular (No editable) -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Teléfono Celular</label>
            <p class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 bg-gray-100">
                {{ auth()->user()->cellphone }}
            </p>
        </div>

        <!-- Direcciones -->
        <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Tus Direcciones</h3>

        @foreach($direcciones as $direccion)
            <div class="mb-4 p-4 border border-gray-300 rounded-md {{ $direccion->is_default ? 'bg-green-100' : 'bg-white' }}">
                <p><strong>Ciudad:</strong> {{ $direccion->ciudad }}</p>
                <p><strong>Calle Principal:</strong> {{ $direccion->calle_principal }}</p>
                <p><strong>Número Exterior:</strong> {{ $direccion->numero_exterior }}</p>
                <p><strong>Número Interior:</strong> {{ $direccion->numero_interior }}</p>
                <p><strong>Cruzamientos:</strong> {{ $direccion->cruzamientos }}</p>
                <p><strong>Detalles:</strong> {{ $direccion->detalles }}</p>
                <p><strong>Código Postal:</strong> {{ $direccion->codigo_postal }}</p>
        
                <!-- Botón para seleccionar la dirección como predeterminada -->
                @if(!$direccion->is_default)
                <form action="{{ route('profile.setDefaultAddress', $direccion->ID_Direccion) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md">
                        Marcar como Predeterminada
                    </button>
                </form>
                @else
                <p class="mt-2 px-4 py-2 bg-green-500 text-white rounded-md">
                    Dirección Predeterminada
                </p>
                @endif
            </div>
        @endforeach

    </div>
</div>
@endsection
