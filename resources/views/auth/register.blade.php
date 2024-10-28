@extends('layouts.app')

@section('title', 'Registro')

@section('content')

<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md relative">
        
        <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Crea tu Cuenta</h2>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Nombre -->
            <div>
                <x-input-label for="name" :value="__('Nombre')" class="text-gray-700" />
                <x-text-input id="name" class="block mt-1 w-full p-3 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" 
                              type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500" />
            </div>

            <!-- Apellidos -->
            <div>
                <x-input-label for="last_name" :value="__('Apellidos')" class="text-gray-700" />
                <x-text-input id="last_name" class="block mt-1 w-full p-3 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" 
                              type="text" name="last_name" :value="old('last_name')" required autocomplete="family-name" />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2 text-red-500" />
            </div>

            <!-- Correo Electrónico -->
            <div>
                <x-input-label for="email" :value="__('Correo Electrónico')" class="text-gray-700" />
                <x-text-input id="email" class="block mt-1 w-full p-3 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" 
                              type="email" name="email" :value="old('email')" required autocomplete="username"
                              pattern="^[a-zA-Z0-9._%+-]+@(gmail\.com|hotmail\.com|alumnos\.uady\.mx)$" 
                              title="Por favor, ingrese un correo válido (gmail.com, hotmail.com, alumnos.uady.mx)" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
            </div>

            <!-- Contraseña -->
            <div>
                <x-input-label for="password" :value="__('Contraseña')" class="text-gray-700" />
                <x-text-input id="password" class="block mt-1 w-full p-3 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" 
                              type="password" name="password" required autocomplete="new-password" 
                              minlength="8" maxlength="16" title="La contraseña debe tener entre 8 y 16 caracteres." />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
            </div>

            <!-- Confirmar Contraseña -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="text-gray-700" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full p-3 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" 
                              type="password" name="password_confirmation" required autocomplete="new-password" 
                              minlength="8" maxlength="16" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-between mt-6">
                <a class="text-sm text-blue-600 hover:underline focus:outline-none focus:ring-2 focus:ring-blue-500" href="{{ route('login') }}">
                    {{ __('¿Ya tienes cuenta? Inicia sesión') }}
                </a>

                <button type="submit" class="w-full py-3 mt-3 bg-blue-700 hover:bg-blue-800 text-white font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    {{ __('Registrarse') }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
