@extends('layouts.app')

@section('title', 'Home')

@section('content')

<x-guest-layout>
        <!-- Formulario con fondo azul y diseño deseado -->
        <div class="relative p-8 max-w-md w-full">
            <!-- Background shapes: Cubriendo todo el formulario -->
            <div class="absolute inset-0 bg-blue-400 w-full h-full rounded transform rotate-12 z-0"></div>
            <div class="absolute inset-0 bg-blue-500 w-full h-full rounded transform -rotate-6 z-0"></div>

            <form method="POST" action="{{ route('register') }}" class="relative z-10 bg-blue-600 p-8 rounded-lg shadow-lg">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Nombre')" class="text-white" />
                    <x-text-input id="name" class="block mt-1 w-full p-2 rounded-md" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" class="text-white" />
                    <x-text-input id="email" class="block mt-1 w-full p-2 rounded-md" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Contraseña')" class="text-white" />
                    <x-text-input id="password" class="block mt-1 w-full p-2 rounded-md"
                                  type="password"
                                  name="password"
                                  required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="text-white" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full p-2 rounded-md"
                                  type="password"
                                  name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-between mt-6">
                    <a class="underline text-sm text-gray-200 hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white" href="{{ route('login') }}">
                        {{ __('¿Ya está registrado?') }}
                    </a>

                    <x-primary-button class="bg-blue-800 hover:bg-blue-900 text-white px-4 py-2 rounded-md">
                        {{ __('Registrar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
</x-guest-layout>

@endsection