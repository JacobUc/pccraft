@extends('layouts.app')

@section('title', 'Home')

@section('content')

<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('¿Olvidaste tu contraseña? No hay problema. Solo ingresa tu dirección de correo electrónico y te enviaremos un enlace para restablecer tu contraseña.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus
                pattern="^[a-zA-Z0-9._%+-]+@(gmail\.com|hotmail\.com|alumnos\.uady\.mx)$"
                title="Por favor, ingrese un correo válido (gmail.com, hotmail.com, alumnos.uady.mx)" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-4">
            <x-primary-button>
                {{ __('Enviar ') }}
            </x-primary-button>
        </div>
        <a href="{{ route('login') }}" class="flex items-center justify-center mt-4">
            Ir a Inicio de Sesión
        </a>
    </form>
</x-guest-layout>

@endsection