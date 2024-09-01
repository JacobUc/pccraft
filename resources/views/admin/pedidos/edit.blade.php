@extends('admin.layouts.template')

@section('title', 'Editar Pedido')

@section('content_header')
    <h1>Editar Pedido</h1>
@endsection

@section('content')
<div class="container">

    <br>
    <br>
    <h2>Detalles de la Orden</h2>
    
    <table class="table">
        <thead>
            <tr>
                <th>ID Orden</th>
                <th>Fecha</th>
                <th>Dirección</th>
                <th>Total a pagar</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $orden->ID_Orden }}</td>
                <td>{{ $orden->fecha }}</td>
                <td>{{ $orden->direccion->calle_principal }}, {{ $orden->direccion->ciudad }}</td>
                <td>${{ $orden->total }}</td>
                <td>
                    <form action="{{ route('pedidos.update', $orden->ID_Orden) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <select name="estado" class="form-control">
                            <option value="pedido" {{ $orden->estado == 'pedido' ? 'selected' : '' }}>Pedido</option>
                            <option value="enviado" {{ $orden->estado == 'enviado' ? 'selected' : '' }}>Enviado</option>
                            <option value="entregado" {{ $orden->estado == 'entregado' ? 'selected' : '' }}>Entregado</option>
                        </select>
                        <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>

    <br>
    <br>
    <h3>Artículos</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>ID Producto</th>
                <th>Modelo</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orden->productos as $productoOrden)
            <tr>
                <td>{{ $productoOrden->producto->nombre }}</td>
                <td>{{ $productoOrden->ID_Producto }}</td>
                <td>{{ $productoOrden->producto->modelo }}</td>
                <td>{{ $productoOrden->cantidad }}</td>
                <td>${{ $productoOrden->producto->precio }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <br>
    <h3>Datos del Usuario</h3>
    <table class="table">
        <thead>
            <tr>
                <th>ID Usuario</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $orden->ID_Usuario }}</td>
                <td>{{ $orden->usuario->name ?? 'No disponible'}}</td>
                <td>{{ $orden->direccion->calle_principal }}, {{ $orden->direccion->ciudad }}</td>
                <td>{{ $orden->usuario->telefono ?? 'No disponible' }}</td>
                <td>{{ $orden->usuario->email ?? 'No disponible'}}</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
