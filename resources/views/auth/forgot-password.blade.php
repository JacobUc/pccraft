@extends('layouts.app')

@section('title', 'Restablecer Contraseña')

@section('content')

<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md relative">

        <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Restablece tu Contraseña</h2>

        <p class="mb-4 text-sm text-gray-600 text-center">
            {{ __('¿Olvidaste tu contraseña? No te preocupes. Ingresa tu correo electrónico y te enviaremos un enlace para restablecerla.') }}
        </p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf

            <!-- Dirección de Correo Electrónico -->
            <div>
                <x-input-label for="email" :value="__('Correo Electrónico')" class="text-gray-700" />
                <x-text-input id="email" class="block mt-1 w-full p-3 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                              type="email" name="email" :value="old('email')" required autofocus
                              pattern="^[a-zA-Z0-9._%+-]+@(gmail\.com|hotmail\.com|alumnos\.uady\.mx)$"
                              title="Por favor, ingrese un correo válido (gmail.com, hotmail.com, alumnos.uady.mx)" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
            </div>

            <!-- Botón de Enviar -->
            <div class="flex items-center justify-center mt-6">
                <button type="submit" class="w-full py-3 bg-blue-700 hover:bg-blue-800 text-white font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    {{ __('Enviar Enlace de Restablecimiento') }}
                </button>
            </div>

            <!-- Enlace a Iniciar Sesión -->
            <div class="text-center mt-4">
                <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline focus:outline-none focus:ring-2 focus:ring-blue-500">
                    {{ __('Regresar al Inicio de Sesión') }}
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
