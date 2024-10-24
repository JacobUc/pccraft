<!-- resources/views/checkout/cancel.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">El pago fue cancelado</h1>

        @if (session('error'))
            <div class="alert alert-danger mt-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="text-center mt-4">
            <a href="{{ route('cart.index') }}" class="btn btn-primary">Volver al carrito</a>
        </div>
    </div>
@endsection
