@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">¡Compra completada con éxito!</h1>
    <p class="text-center">Gracias por tu compra. Tu pedido ha sido procesado y recibirás una confirmación pronto.</p>
    @if (session('error'))
            <div class="alert alert-danger mt-4">
                {{ session('error') }}
            </div>
        @endif
    <div class="text-center mt-4">
        <a href="{{ route('home') }}" class="btn btn-primary">Volver a la tienda</a>
    </div>
</div>
@endsection

