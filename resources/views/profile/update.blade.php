@extends('layouts.app')

@section('title', 'Editar Perfil')

@section('content')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Editar Perfil') }}
    </h2>
</x-slot>

<!-- Mensajes de éxito o error -->
@if (session('status'))
    <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3" role="alert">
        <p class="font-bold">{{ session('status') }}</p>
    </div>
@endif

@if ($errors->any())
    <div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3" role="alert">
        <p class="font-bold">Hubo algunos problemas con tu entrada:</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Aumentar el ancho máximo del contenedor principal -->
<div class="flex max-w-6xl w-full mx-auto px-6 lg:px-8 space-x-6">
    <!-- Sidebar (Fijo a la izquierda) -->
    <div class="bg-white shadow sm:rounded-lg p-6 w-1/4">
        <ul class="space-y-4">
            <li>
                <a href="{{ route('profile.edit') }}" class="text-gray-700 hover:underline">Volver a perfil</a>
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

    <!-- Formulario de edición de perfil -->
    <div class="bg-white shadow sm:rounded-lg p-6 flex-grow">
        <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Editar Información Básica</h3>

        <form method="POST" action="{{ route('profile.update.save') }}">
            @csrf

            <!-- Nombre -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
            </div>

            <!-- Apellidos -->
            <div class="mb-4">
                <label for="last_name" class="block text-sm font-medium text-gray-700">Apellidos</label>
                <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
            </div>

            <!-- Correo Electrónico -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
            </div>

            <!-- Teléfono Celular -->
            <div class="mb-4">
                <label for="cellphone" class="block text-sm font-medium text-gray-700">Teléfono Celular</label>
                <input type="text" id="cellphone" name="cellphone" value="{{ old('cellphone', $user->cellphone) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
            </div>

            <!-- Botón Guardar Perfil -->
            <div class="flex justify-end mb-8">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md">
                    Guardar
                </button>
            </div>
        </form>

                <!-- Formulario para actualizar contraseña -->
                <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Actualizar Contraseña</h3>
        <form method="POST" action="{{ route('profile.updatePassword') }}">
            @csrf

            <!-- Nueva Contraseña -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Nueva Contraseña</label>
                <input type="password" id="password" name="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
            </div>

            <!-- Confirmar Contraseña -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
            </div>

            <!-- Botón Actualizar Contraseña -->
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md">
                    Actualizar
                </button>
            </div>
        </form>

        <!-- Formulario para agregar dirección -->
        <div class="bg-white shadow sm:rounded-lg p-6 flex-grow">
            <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Agregar Dirección</h3>
            <form method="POST" action="{{ route('profile.addAddress') }}">
                @csrf

                <!-- Campos del formulario de dirección -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="ciudad" class="block text-sm font-medium text-gray-700">Ciudad</label>
                        <input type="text" id="ciudad" name="ciudad" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                    </div>

                    <div class="mb-4">
                        <label for="calle_principal" class="block text-sm font-medium text-gray-700">Calle Principal</label>
                        <input type="text" id="calle_principal" name="calle_principal" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                    </div>

                    <div class="mb-4">
                        <label for="numero_exterior" class="block text-sm font-medium text-gray-700">Número Exterior</label>
                        <input type="text" id="numero_exterior" name="numero_exterior" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                    </div>

                    <div class="mb-4">
                        <label for="numero_interior" class="block text-sm font-medium text-gray-700">Número Interior</label>
                        <input type="text" id="numero_interior" name="numero_interior" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                    </div>

                    <div class="mb-4">
                        <label for="cruzamientos" class="block text-sm font-medium text-gray-700">Cruzamientos</label>
                        <input type="text" id="cruzamientos" name="cruzamientos" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                    </div>

                    <div class="mb-4">
                        <label for="codigo_postal" class="block text-sm font-medium text-gray-700">Código Postal</label>
                        <input type="text" id="codigo_postal" name="codigo_postal" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3">
                    </div>

                    <div class="col-span-2 mb-4">
                        <label for="detalles" class="block text-sm font-medium text-gray-700">Detalles</label>
                        <textarea id="detalles" name="detalles" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2 px-3"></textarea>
                    </div>
                </div>

                <!-- Botón Guardar Dirección -->
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md">
                        Guardar
                    </button>
                </div>
            </form>

            <!-- Listado de direcciones existentes -->
            <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4 mt-8">Tus Direcciones</h3>

            @foreach($direcciones as $direccion)
            <div class="mb-4 p-4 border border-gray-300 rounded-md {{ $direccion->is_default ? 'bg-green-100' : 'bg-white' }}">
                <p><strong>Ciudad:</strong> {{ $direccion->ciudad }}</p>
                <p><strong>Calle Principal:</strong> {{ $direccion->calle_principal }}</p>
                <p><strong>Número Exterior:</strong> {{ $direccion->numero_exterior }}</p>
                <p><strong>Cruzamientos:</strong> {{ $direccion->cruzamientos }}</p>
                <p><strong>Código Postal:</strong> {{ $direccion->codigo_postal }}</p>

                <!-- Botones para Editar y Eliminar Dirección -->
                <div class="flex space-x-2">
                    <!-- Editar Dirección -->
                    <form action="{{ route('profile.editAddress', $direccion->ID_Direccion) }}" method="GET">
                        @csrf
                        <button type="submit" class="mt-2 px-4 py-2 bg-yellow-500 text-white rounded-md">
                            Editar
                        </button>
                    </form>

                    <!-- Eliminar Dirección -->
                    <form action="{{ route('profile.deleteAddress', $direccion->ID_Direccion) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="mt-2 px-4 py-2 bg-red-500 text-white rounded-md">
                            Eliminar
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection