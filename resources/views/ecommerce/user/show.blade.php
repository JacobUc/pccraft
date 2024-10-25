@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Detalles de la Orden #{{ $order->ID_Orden }}</h1>

    <div class="bg-white shadow sm:rounded-lg p-6">
        <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Información de la Orden</h3>
        
        <!-- Order details structured in a table format -->
        <div class="relative overflow-x-auto rounded-lg shadow-md">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-collapse">
                <thead class="bg-gray-200 text-xs text-gray-900 uppercase dark:bg-gray-700 dark:text-gray-200">
                    <tr>
                        <th class="px-6 py-3">ID Orden</th>
                        <th class="px-6 py-3">Fecha</th>
                        <th class="px-6 py-3">Estado</th>
                        <th class="px-6 py-3">Total</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $order->ID_Orden }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($order->fecha)->format('d/m/Y') }}</td>
                        <td class="px-6 py-4">
                            <!-- Mostrar el formulario si el estado es pendiente o enviado -->
                            @if($order->estado == 'pedido' || $order->estado == 'enviado')
                                <!-- Formulario para cambiar el estado -->
                                <form action="{{ route('user.orders.update', $order->ID_Orden) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="estado" id="estado" class="form-select text-center px-3 py-2 border rounded-lg">
                                        <!-- Mostrar el estado actual y permitir cambiar a cancelado -->
                                        <option value="{{ $order->estado }}" selected>{{ ucfirst($order->estado) }}</option>
                                        <option value="cancelado">Cancelado</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg ml-4">Actualizar</button>
                                </form>
                            @else
                                <!-- Estado no editable si es 'cancelado' o 'entregado' -->
                                <span class="px-4 py-2 font-bold leading-tight rounded-lg 
                                    {{ $order->estado == 'cancelado' ? 'bg-red-200 text-red-800' : 'bg-green-200 text-green-800' }}">
                                    {{ ucfirst($order->estado) }}
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">{{ number_format($order->total, 2) }} MXN</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4 mt-6">Productos en la Orden</h3>
        
        <!-- Tabla de detalles del producto -->
        <div class="relative overflow-x-auto rounded-lg shadow-md">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-collapse">
                <thead class="bg-gray-200 text-xs text-gray-900 uppercase dark:bg-gray-700 dark:text-gray-200">
                    <tr>
                        <th class="px-6 py-3">Producto</th>
                        <th class="px-6 py-3">Cantidad</th>
                        <th class="px-6 py-3">Precio Unitario</th>
                        <th class="px-6 py-3">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach($order->productos as $producto)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $producto->nombre }}</td>
                        <td class="px-6 py-4">{{ $producto->pivot->cantidad }}</td>
                        <td class="px-6 py-4">{{ number_format($producto->pivot->precio, 2) }} MXN</td>
                        <td class="px-6 py-4">{{ number_format($producto->pivot->cantidad * $producto->pivot->precio, 2) }} MXN</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
