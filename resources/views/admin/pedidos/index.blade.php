@extends('admin.layouts.template')

@section('title', 'Pedidos')

@section('content_header')

<div class="container">
  <h1>Órdenes de Usuarios</h1>

  <!-- Barra de búsqueda por nombre de usuario -->
  <form method="GET" action="{{ route('pedidos.index') }}">
      <div class="row mb-3">
          <div class="col-md-9">
              <input type="text" name="search" id="search" class="form-control" placeholder="Buscar órdenes por nombre de usuario">
          </div>
          <div class="col-md-3 text-end">
              <button type="submit" class="btn btn-primary">Buscar</button>
          </div>
      </div>
  </form>

  <!-- Barra de búsqueda y filtros -->
  <form method="GET" action="{{ route('pedidos.index') }}">
      <div class="row mb-3">
          <!-- Filtro por fecha -->
          <div class="col-md-3">
              <label for="fecha" class="form-label">Fecha</label>
              <select name="fecha" id="fecha" class="form-select">
                  <option value="">Seleccionar</option>
                  <option value="asc" {{ request('fecha') == 'asc' ? 'selected' : '' }}>Ascendente</option>
                  <option value="desc" {{ request('fecha') == 'desc' ? 'selected' : '' }}>Descendente</option>
              </select>
          </div>

          <!-- Filtro por total -->
          <div class="col-md-3">
              <label for="total" class="form-label">Total</label>
              <select name="total" id="total" class="form-select">
                  <option value="">Seleccionar</option>
                  <option value="asc" {{ request('total') == 'asc' ? 'selected' : '' }}>Ascendente</option>
                  <option value="desc" {{ request('total') == 'desc' ? 'selected' : '' }}>Descendente</option>
              </select>
          </div>

          <!-- Filtro por estado -->
          <div class="col-md-3">
              <label for="estado" class="form-label">Estado</label>
              <select name="estado" id="estado" class="form-select">
                  <option value="">Seleccionar</option>
                  <option value="" {{ request('estado') == '' ? 'selected' : '' }}>Todos</option>
                  <option value="pedido" {{ request('estado') == 'pedido' ? 'selected' : '' }}>Pedido</option>
                  <option value="enviado" {{ request('estado') == 'enviado' ? 'selected' : '' }}>Enviado</option>
                  <option value="entregado" {{ request('estado') == 'entregado' ? 'selected' : '' }}>Entregado</option>
              </select>
          </div>

          <!-- Botones de buscar y resetear -->
          <div class="col-md-3 d-flex align-items-end justify-content-end">
              <button type="submit" class="btn btn-primary me-2">Aplicar</button>
              <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">Resetear Filtros</a>
          </div>
      </div>
  </form>
</div>

@endsection

@section('content')

<div class="container">

    <!-- Tabla de órdenes -->
    <table class="table table-bordered">
      <thead>
          <tr>
              <th>ID Orden</th>
              <th>Usuario</th>
              <th>Fecha</th>
              <th>Total</th>
              <th>Estado</th>
              <th>Acciones</th>
          </tr>
      </thead>
      <tbody>
          @forelse($ordenes as $orden)
          <tr>
              <td>{{ $orden->ID_Orden }}</td>
              <td>{{ $orden->usuario->name }}</td>
              <td>{{ $orden->fecha }}</td>
              <td>{{ $orden->total }}</td>
              <td>{{ $orden->estado }}</td>
              <td>
                  <a href="{{ route('pedidos.edit', $orden->ID_Orden) }}" class="btn btn-info">Más detalles</a>
              </td>
          </tr>
          @empty
          <tr>
              <td colspan="6" class="text-center">No hay órdenes disponibles.</td>
          </tr>
          @endforelse
      </tbody>
  </table>

  <!-- Paginación -->
  {{ $ordenes->links() }}

</div>

@endsection