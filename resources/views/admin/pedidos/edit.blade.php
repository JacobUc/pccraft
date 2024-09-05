@extends('admin.layouts.template')

@section('title', 'Editar Pedido')

@section('content_header')
<div class="container">
    <h1>Detalles Pedido</h1>
</div>
@endsection

@section('content')
<div class="container space-y-6">
    
    <div class="container">
        <h2>Detalles de la Orden</h2>
        <div class="relative overflow-x-auto overflow-hidden rounded-lg shadow-md">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border-collapse">
                <thead class="text-xs text-gray-900 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID Orden</th>
                        <th scope="col" class="px-6 py-3">Fecha</th>
                        <th scope="col" class="px-6 py-3">Dirección</th>
                        <th scope="col" class="px-6 py-3">Total a pagar</th>
                        <th scope="col" class="px-6 py-3">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $orden->ID_Orden }}</td>
                        <td class="px-6 py-4">{{ $orden->fecha }}</td>
                        <td class="px-6 py-4">{{ $orden->direccion->calle_principal }}, {{ $orden->direccion->ciudad }}</td>
                        <td class="px-6 py-4">${{ $orden->total }}</td>
                        <td class="px-6 py-4 text-center">
                            <form action="{{ route('pedidos.update', $orden->ID_Orden) }}" method="POST" class="flex flex-col">
                                @csrf
                                @method('PATCH')
                                <!-- Se aplica la misma clase de ancho al select y al botón -->
                                <select name="estado" class="form-control text-center w-40 px-3 py-2 border rounded-lg">
                                    <option class="text-center" value="pedido" {{ $orden->estado == 'pedido' ? 'selected' : '' }}>Pedido</option>
                                    <option class="text-center" value="enviado" {{ $orden->estado == 'enviado' ? 'selected' : '' }}>Enviado</option>
                                    <option class="text-center" value="entregado" {{ $orden->estado == 'entregado' ? 'selected' : '' }}>Entregado</option>
                                    <option class="text-center" value="cancelado" {{ $orden->estado == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                                </select>
                                <button type="submit" class="btn btn-primary mt-2 w-40 text-center px-3 py-2 border rounded-lg">Actualizar</button>
                            </form>
                        </td>                        
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container">
        <h3>Artículos</h3>
        <div class="relative overflow-x-auto overflow-hidden rounded-lg shadow-md">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border-collapse">
                <thead class="text-xs text-gray-900 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">Imagen</th>
                        <th scope="col" class="px-6 py-3">Nombre</th>
                        <th scope="col" class="px-6 py-3">ID Producto</th>
                        <th scope="col" class="px-6 py-3">Modelo</th>
                        <th scope="col" class="px-6 py-3">Cantidad</th>
                        <th scope="col" class="px-6 py-3">Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orden->productos as $productoOrden)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4"><img src="{{asset('storage/' . $productoOrden->producto->url_photo)}}" alt="Producto" class="rounded-lg max-w-[80px] max-h-[80px]"></td>
                        <td class="px-6 py-4">{{ $productoOrden->producto->nombre }}</td>
                        <td class="px-6 py-4">{{ $productoOrden->ID_Producto }}</td>
                        <td class="px-6 py-4">{{ $productoOrden->producto->modelo }}</td>
                        <td class="px-6 py-4">{{ $productoOrden->cantidad }}</td>
                        <td class="px-6 py-4">${{ $productoOrden->producto->precio }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="container">
        <h3>Datos del Usuario</h3>
        <div class="relative overflow-x-auto overflow-hidden rounded-lg shadow-md">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border-collapse">
                <thead class="text-xs text-gray-900 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID Usuario</th>
                        <th scope="col" class="px-6 py-3">Nombre</th>
                        <th scope="col" class="px-6 py-3">Dirección</th>
                        <th scope="col" class="px-6 py-3">Teléfono</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $orden->ID_Usuario }}</td>
                        <td class="px-6 py-4">{{ $orden->usuario->name ?? 'No disponible'}}</td>
                        <td class="px-6 py-4">{{ $orden->direccion->calle_principal }}, {{ $orden->direccion->ciudad }}</td>
                        <td class="px-6 py-4">{{ $orden->usuario->telefono ?? 'No disponible' }}</td>
                        <td class="px-6 py-4">{{ $orden->usuario->email ?? 'No disponible'}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container">
        <a href="{{ route('pedidos.index')}}"" class="inline-flex items-center w-min px-4 py-2 bg-blue-500 text-white font-semibold text-sm rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Regresar
        </a>
    </div>
    
</div>
@endsection
