<?php

namespace App\Http\Controllers\Admin;

use App\Models\Orden;
use App\Models\Product;
use App\Models\User;
use App\Models\Producto_Orden;
use App\Models\Direccion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function productos()
{
    return $this->belongsToMany(Product::class, 'producto__ordens')
                ->withPivot('cantidad', 'precio');
}

    public function index(Request $request)
    {
        $query = Orden::query();

        // Filtro por fecha
        if ($request->filled('fecha')) {
            $query->orderBy('fecha', $request->fecha);
        }

        // Filtro por total
        if ($request->filled('total')) {
            $query->orderBy('total', $request->total);
        }

        // Filtro por estado
        if ($request->filled('estado')) {
            $query->where('estado', $request->estado);
        }

        // Buscar por ID de orden
        if ($request->filled('search')) {
            $query->where('ID_Orden', $request->search);
        }

        // Obtener los resultados con paginación
        $ordenes = $query->paginate(10);

        return view('admin.pedidos.index', compact('ordenes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Lógica para crear un nuevo pedido si es necesario
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Aquí se puede implementar la lógica de creación de una nueva orden
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Mostrar detalles de la orden y los productos relacionados
        $orden = Orden::with('productos')->findOrFail($id);

        return view('admin.pedidos.show', compact('orden'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Mostrar formulario para editar la orden
        $orden = Orden::findOrFail($id);

        return view('admin.pedidos.edit', compact('orden'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar el estado que será actualizado
        $request->validate([
            'estado' => 'required|in:pedido,enviado,entregado,cancelado',
        ]);

        // Actualizar el estado de la orden
        $orden = Orden::findOrFail($id);
        $orden->estado = $request->estado;
        $orden->save();

        return redirect()->route('pedidos.index')->with('success', '¡Estado del Pedido Actualizado Exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Eliminar la orden de forma segura
        $orden = Orden::findOrFail($id);
        $orden->delete();

        return redirect()->route('pedidos.index')->with('success', '¡Orden eliminada correctamente!');
    }
}
