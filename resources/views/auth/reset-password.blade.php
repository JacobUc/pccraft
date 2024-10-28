@extends('layouts.app')

@section('title', 'Restablecer Contraseña')

@section('content')

<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md relative">
        
        <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Restablece tu Contraseña</h2>

        <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
            @csrf

            <!-- Token para el restablecimiento de contraseña -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Dirección de Correo Electrónico -->
            <div>
                <x-input-label for="email" :value="__('Correo Electrónico')" class="text-gray-700" />
                <x-text-input id="email" class="block mt-1 w-full p-3 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" 
                              type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username"
                              pattern="^[a-zA-Z0-9._%+-]+@(gmail\.com|hotmail\.com|alumnos\.uady\.mx)$"
                              title="Por favor, ingrese un correo válido (gmail.com, hotmail.com, alumnos.uady.mx)" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
            </div>

            <!-- Nueva Contraseña -->
            <div>
                <x-input-label for="password" :value="__('Nueva Contraseña')" class="text-gray-700" />
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

            <!-- Botón de Restablecer Contraseña -->
            <div class="flex items-center justify-center mt-6">
                <button type="submit" class="w-full py-3 bg-blue-700 hover:bg-blue-800 text-white font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    {{ __('Restablecer Contraseña') }}
                </button>
            </div>

        </form>
    </div>
</div>

@endsection
