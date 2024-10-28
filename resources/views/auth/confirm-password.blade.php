@extends('layouts.app')

@section('title', 'Confirmación de Contraseña')

@section('content')

<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md relative">
        
        <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Confirmación de Contraseña</h2>

        <p class="mb-4 text-sm text-gray-600 text-center">
            {{ __('Esta es una zona segura de la aplicación. Por favor, confirma tu contraseña antes de continuar.') }}
        </p>

        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
            @csrf

            <!-- Contraseña -->
            <div>
                <x-input-label for="password" :value="__('Contraseña')" class="text-gray-700" />
                <x-text-input id="password" class="block mt-1 w-full p-3 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" 
                              type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
            </div>

            <!-- Botón de Confirmación -->
            <div class="flex items-center justify-center mt-6">
                <button type="submit" class="w-full py-3 bg-blue-700 hover:bg-blue-800 text-white font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    {{ __('Confirmar') }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
