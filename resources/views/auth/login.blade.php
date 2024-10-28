@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')

<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md relative">
        
        <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Bienvenido de Nuevo</h2>

        <!-- Formulario de Login -->
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Correo Electrónico')" class="text-gray-700" />
                <x-text-input id="email" class="block mt-1 w-full p-3 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" 
                    type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                    pattern="^[a-zA-Z0-9._%+-]+@(gmail\.com|hotmail\.com|alumnos\.uady\.mx)$" 
                    title="Por favor, ingrese un correo válido (gmail.com, hotmail.com, alumnos.uady.mx)" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Contraseña')" class="text-gray-700" />
                <x-text-input id="password" class="block mt-1 w-full p-3 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" 
                              type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recordar') }}</span>
                </label>
                
                @if (Route::has('password.request'))
                    <a class="text-sm text-blue-600 hover:underline focus:outline-none focus:ring-2 focus:ring-blue-500" href="{{ route('password.request') }}">
                        {{ __('Olvidé mi contraseña') }}
                    </a>
                @endif
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full py-3 mt-3 bg-blue-700 hover:bg-blue-800 text-white font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    {{ __('Iniciar Sesión') }}
                </button>
            </div>

            <!-- Register Link -->
            <div class="text-center mt-4">
                <span class="text-gray-600 text-sm">¿No tienes cuenta?</span>
                <a href="{{ route('register') }}" class="text-blue-600 hover:underline text-sm">
                    Regístrate aquí
                </a>
            </div>

        </form>
    </div>
</div>

@endsection
