@extends('layouts.app')

@section('title', 'Verificación de Correo Electrónico')

@section('content')

<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md relative">
        
        <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Verifica tu Correo Electrónico</h2>

        <p class="mb-4 text-sm text-gray-600 text-center">
            {{ __('Gracias por registrarte! Antes de comenzar, por favor verifica tu dirección de correo electrónico haciendo clic en el enlace que te hemos enviado. Si no recibiste el correo, te podemos enviar otro.') }}
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600 text-center">
                {{ __('Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionaste durante el registro.') }}
            </div>
        @endif

        <div class="mt-6 flex flex-col gap-4">
            <!-- Botón de Reenviar Verificación -->
            <form method="POST" action="{{ route('verification.send') }}" class="text-center">
                @csrf
                <button type="submit" class="w-full py-3 bg-blue-700 hover:bg-blue-800 text-white font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    {{ __('Reenviar Correo de Verificación') }}
                </button>
            </form>

            <!-- Botón de Cerrar Sesión -->
            <form method="POST" action="{{ route('logout') }}" class="text-center">
                @csrf
                <button type="submit" class="text-sm text-blue-600 hover:underline focus:outline-none focus:ring-2 focus:ring-blue-500">
                    {{ __('Cerrar Sesión') }}
                </button>
            </form>
        </div>
    </div>
</div>

@endsection
