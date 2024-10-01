<?php

namespace App\Http\Controllers\Ecommerce;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfiguradorPCController extends Controller
{
        /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // Validar que se ha enviado al menos una marca
        $validatedData = $request->validate([
            'marca' => 'required|array',         // El campo 'marca' debe ser un array (checkbox múltiple)
            'marca.*' => 'in:AMD,Intel',         // Cada elemento del array debe ser uno de estos valores
        ], [
            'marca.required' => 'Debes seleccionar una marca.',
            'marca.in' => 'La marca seleccionada no es válida.',
        ]);

            // Obtener todos los productos
        $products = Product::all();

        // Si los datos de la marca se validaron correctamente, se selecciona la marca
        if (!empty($validatedData)) {
            $selectedMarca = $request->input('marca')[0];

            // Realiza las operaciones necesarias con la marca seleccionada
            //$procesadores = Product::where('fabricante', $selectedMarca)->get();

            $procesadores = Product::whereHas('category', function ($query) {
                $query->where('nombre_categoria', 'Procesador'); // Filtrar por categoría "Procesador"
            })->where('fabricante', $selectedMarca)
              ->get();

            // Si hay procesadores, retorna productos y procesadores a la vista
            return view('ecommerce.configuradorpc', compact('products', 'procesadores'))
                ->withTitle('E-COMMERCE STORE | CONFIGURADOR PC');
        }

        // Si no se seleccionó ninguna marca, sólo retornamos los productos
        return view('ecommerce.configuradorpc', compact('products'))
            ->withTitle('E-COMMERCE STORE | CONFIGURADOR PC');
    
    }

    public function shop()
    {
        $products = Product::all();
        return view('welcome')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $products]);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
