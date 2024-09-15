@extends('layouts.app')

@section('title', 'Home')

@section('content')

<x-guest-layout>
    <!-- Formulario con fondo azul y diseño deseado -->
    <div class="relative p-8 max-w-md w-full">
        <!-- Background shapes: Cubriendo todo el formulario -->
        <div class="absolute inset-0 bg-blue-400 w-full h-full rounded transform rotate-12 z-0"></div>
        <div class="absolute inset-0 bg-blue-500 w-full h-full rounded transform -rotate-6 z-0"></div>

        <!-- Formulario de Login -->
        <form method="POST" action="{{ route('login') }}" class="relative z-10 bg-blue-600 p-8 rounded-lg shadow-lg max-w-md w-full">
            @csrf

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-white" />
                <x-text-input id="email" class="block mt-1 w-full p-2 rounded-md" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Contraseña')" class="text-white" />
                <x-text-input id="password" class="block mt-1 w-full p-2 rounded-md"
                              type="password"
                              name="password"
                              required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center text-white">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm">{{ __('Recordar') }}</span>
                </label>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-200 hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white" href="{{ route('password.request') }}">
                        {{ __('Olvide la Contraseña') }}
                    </a>
                @endif

                <x-primary-button class="bg-blue-800 hover:bg-blue-900 text-white px-4 py-2 rounded-md ms-3">
                    {{ __('Iniciar Sesión') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>


@endsection