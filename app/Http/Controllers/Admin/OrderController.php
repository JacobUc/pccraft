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

        // Buscar por id orden
        if ($request->filled('search')) {
            $query->where('ID_Orden', $request->search);
        }      

        /*
        if ($request->filled('search')) {
            // Realiza la búsqueda en la relación con la tabla de usuarios
            $query->whereHas('usuario', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->input('search') . '%');
            });
        }
        */

        // Obtener los resultados con paginación
        $ordenes = $query->paginate(10);

        return view('admin.pedidos.index', compact('ordenes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $orden = Orden::findOrFail($id);

        return view('admin.pedidos.edit', compact('orden'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|in:pedido,enviado,entregado,cancelado',
        ]);
    
        $orden = Orden::findOrFail($id);
        $orden->estado = $request->estado;
        $orden->save();  // Cambia esto
    
        return redirect()->route('pedidos.index')->with('success', '¡Estado del Pedido Actualizado Exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
