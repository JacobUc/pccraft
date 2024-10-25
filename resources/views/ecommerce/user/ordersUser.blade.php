@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Mis Compras</h1>

    @if (Session::get('success'))
        <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                <strong>{{ Session::get('success') }}</strong>
            </div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-70 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            </button>
        </div>
    @endif

    <div class="flex justify-between items-center mb-4">
        <!-- Barra de búsqueda y filtros en una sola línea -->
        <form method="GET" action="{{ route('user.orders.index') }}" class="flex items-center space-x-4">
            <!-- Filtro por fecha -->
        <div class="relative">
            <select name="fecha" id="fecha" class="form-select min-w-40 text-center px-3 py-2 border rounded-lg pl-10">
                <option value="" disabled {{ request('fecha') ? '' : 'selected' }} hidden>Fecha</option>
                <option value="asc" {{ request('fecha') == 'asc' ? 'selected' : '' }}>Ascendente</option>
                <option value="desc" {{ request('fecha') == 'desc' ? 'selected' : '' }}>Descendente</option>
            </select>
            <!-- Icono de calendario -->
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <!-- SVG del icono -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                <path fill-rule="evenodd" d="M4 1.75a.75.75 0 0 1 1.5 0V3h5V1.75a.75.75 0 0 1 1.5 0V3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2V1.75ZM4.5 6a1 1 0 0 0-1 1v4.5a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-7Z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>

        <!-- Filtro por total -->
        <div class="relative">
            <select name="total" id="total" class="form-select min-w-40 text-center px-3 py-2 border rounded-lg pl-10">
                <option value="" disabled {{ request('total') ? '' : 'selected' }} hidden>Precio</option>
                <option value="asc" {{ request('total') == 'asc' ? 'selected' : '' }}>Ascendente</option>
                <option value="desc" {{ request('total') == 'desc' ? 'selected' : '' }}>Descendente</option>
            </select>
            <!-- Icono de moneda -->
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <!-- SVG del icono -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                <path d="M6.375 5.5h.875v1.75h-.875a.875.875 0 1 1 0-1.75ZM8.75 10.5V8.75h.875a.875.875 0 0 1 0 1.75H8.75Z" />
                <path fill-rule="evenodd" d="M15 8A7 7 0 1 1 1 8a7 7 0 0 1 14 0ZM7.25 3.75a.75.75 0 0 1 1.5 0V4h2.5a.75.75 0 0 1 0 1.5h-2.5v1.75h.875a2.375 2.375 0 1 1 0 4.75H8.75v.25a.75.75 0 0 1-1.5 0V12h-2.5a.75.75 0 0 1 0-1.5h2.5V8.75h-.875a2.375 2.375 0 1 1 0-4.75h.875v-.25Z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>

        <!-- Filtro por estado -->
        <div class="relative">
            <select name="estado" id="estado" class="form-select min-w-40 text-center px-3 py-2 border rounded-lg pl-10">
                <option value="" disabled {{ request('estado') ? '' : 'selected' }} hidden>Estado</option>
                <option value="pedido" {{ request('estado') == 'pedido' ? 'selected' : '' }}>Pedido</option>
                <option value="enviado" {{ request('estado') == 'enviado' ? 'selected' : '' }}>Enviado</option>
                <option value="entregado" {{ request('estado') == 'entregado' ? 'selected' : '' }}>Entregado</option>
                <option value="cancelado" {{ request('estado') == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
            </select>
            <!-- Icono de estado -->
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <!-- SVG del icono -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                <path fill-rule="evenodd" d="M1 8.74c0 .983.713 1.825 1.69 1.943.904.108 1.817.19 2.737.243.363.02.688.231.85.556l1.052 2.103a.75.75 0 0 0 1.342 0l1.052-2.103c.162-.325.487-.535.85-.556.92-.053 1.833-.134 2.738-.243.976-.118 1.689-.96 1.689-1.942V4.259c0-.982-.713-1.824-1.69-1.942a44.45 44.45 0 0 0-10.62 0C1.712 2.435 1 3.277 1 4.26v4.482Zm3-3.49a.75.75 0 0 1 .75-.75h6.5a.75.75 0 0 1 0 1.5h-6.5A.75.75 0 0 1 4 5.25ZM4.75 7a.75.75 0 0 0 0 1.5h2.5a.75.75 0 0 0 0-1.5h-2.5Z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>

            <!-- Campo de búsqueda y botones -->
            <input type="text" name="search" id="search" value="{{ request('search') }}" class="form-control min-w-80 text-start py-2 px-3 border rounded-lg" placeholder="Buscar por ID Pedido...">
            <button type="submit" class="btn btn-primary min-w-20 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-3 rounded-lg">Aplicar</button>
            <a href="{{ route('user.orders.index') }}" class="btn btn-secondary min-w-20 bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-3 rounded-lg">Reiniciar</a>
        </form>

    </div>

    <div class="relative overflow-x-auto overflow-hidden rounded-lg shadow-md">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border-collapse">
            <thead class="text-xs text-gray-900 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">Orden ID</th>
                    <th scope="col" class="px-6 py-3">Fecha</th>
                    <th scope="col" class="px-6 py-3">Estado</th>
                    <th scope="col" class="px-6 py-3">Total</th>
                    <th scope="col" class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">{{ $order->ID_Orden }}</td>
                    <td class="px-6 py-4">{{ $order->fecha ? \Carbon\Carbon::parse($order->fecha)->format('d/m/Y') : 'N/A' }}</td>
                    <td class="px-6 py-4">
                        <span class="
                            px-4 
                            py-2 
                            font-bold 
                            leading-tight 
                            rounded-lg 
                            {{ $order->estado == 'pedido' ? 'bg-blue-200 text-blue-800' : '' }}
                            {{ $order->estado == 'enviado' ? 'bg-yellow-200 text-yellow-800' : '' }}
                            {{ $order->estado == 'entregado' ? 'bg-green-200 text-green-800' : '' }}
                            {{ $order->estado == 'cancelado' ? 'bg-red-200 text-red-800' : '' }}
                        ">
                            {{ ucfirst($order->estado) }}
                        </span>
                    </td>
                    <td class="px-6 py-4">{{ number_format($order->total, 2) }} MXN</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('user.orders.show', $order->ID_Orden) }}" class="font-bold text-blue-600 dark:text-blue-500 hover:underline">Ver detalles</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center px-6 py-4">No hay órdenes disponibles.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-4">
        {{ $orders->links() }}
    </div>
</div>
@endsection
