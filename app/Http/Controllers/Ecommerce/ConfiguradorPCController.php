<?php

namespace App\Http\Controllers\Ecommerce;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfiguradorPCController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    protected $componentesSeleccionados = [];
    protected $componentesQuery = [];

    public function index(Request $request)
    {
        // Obtener todos los procesadores
        $procesadores = Product::whereHas('category', function ($query) {
            $query->where('ID_Categoria', 1); // Filtrar por categoría "Procesador"
        })->get();
        $this->componentesQuery['procesadores'] = $procesadores;
    
        // Obtener todas las tarjetas madre
        $tarjetaMadres = Product::whereHas('category', function ($query) {
            $query->where('ID_Categoria', 3); // Filtrar por categoría "Tarjeta Madre"
        })->get();
        $this->componentesQuery['tarjetaMadres'] = $tarjetaMadres;
    
        // Obtener todas las memorias RAM
        $memoriasRAM = Product::whereHas('category', function ($query) {
            $query->where('ID_Categoria', 4); // Filtrar por categoría "Memorias RAM"
        })->get();
        $this->componentesQuery['memoriasRAM'] = $memoriasRAM;
    
        // Obtener todas las tarjetas de video
        $tarjetasDeVideo = Product::whereHas('category', function ($query) {
            $query->where('ID_Categoria', 2); // Filtrar por categoría "Tarjeta de Video"
        })->get();
        $this->componentesQuery['tarjetasDeVideo'] = $tarjetasDeVideo;
    
        // Obtener todos los discos duros
        $discosDuros = Product::whereHas('category', function ($query) {
            $query->where('ID_Categoria', 5); // Filtrar por categoría "Discos Duros"
        })->get();
        $this->componentesQuery['discosDuros'] = $discosDuros;
    
        // Obtener todos los gabinetes
        $gabinetes = Product::whereHas('category', function ($query) {
            $query->where('ID_Categoria', 6); // Filtrar por categoría "Gabinetes"
        })->get();
        $this->componentesQuery['gabinetes'] = $gabinetes;
    
        // Obtener todas las fuentes de poder
        $fuentesDePoder = Product::whereHas('category', function ($query) {
            $query->where('ID_Categoria', 8); // Filtrar por categoría "Fuentes de Poder"
        })->get();
        $this->componentesQuery['fuentesDePoder'] = $fuentesDePoder;
    
        // Obtener todos los sistemas de enfriamiento
        $enfriamientos = Product::whereHas('category', function ($query) {
            $query->where('ID_Categoria', 9); // Filtrar por categoría "Enfriamientos"
        })->get();
        $this->componentesQuery['enfriamientos'] = $enfriamientos;
        
        // Retornar la vista con el array de componentes query
        return view('ecommerce.configuradorpc', ['componentesQuery' => $this->componentesQuery])
            ->withTitle('E-COMMERCE STORE | CONFIGURADOR PC');
    }

    public function seleccionarProcesador(Request $request)
    {
         // Guardar la información del procesador seleccionado
        $procesadorSeleccionado = Product::findOrFail($request);
       
        // Guardar en array en el backend
        $this->componentesSeleccionados['procesador'] = $procesadorSeleccionado;

        // Realizar query para tarjetas madre compatibles usando el "socket" del procesador
        $socket = $procesadorSeleccionado['especificacionesJSON']['socket'];
        $tarjetasMadreCompatibles = Product::where('especificacionJSON->socket', $socket)
                                ->where('ID_Categoria', 3) // Categoría de tarjetas madre
                                ->get();

        return view('ecommerce.configuradorpc', compact('componentesSeleccionados', 'tarjetasMadreCompatibles'))
        ->withTitle('E-COMMERCE STORE | CONFIGURADOR PC');
    }

    // Selección de tarjeta madre
    public function seleccionarTarjetaMadre(Request $request)
    {
        // Guardar la información de la tarjeta madre seleccionada
        $tarjetaMadreSeleccionada = Product::findOrFail($request);
        
        // Guardar en array en el backend
        $this->componentesSeleccionados['tarjetaMadre'] = $tarjetaMadreSeleccionada;

        // Realizar query para memorias RAM compatibles usando el "socket" de la tarjeta madre
        $tipo_memoria = $tarjetaMadreSeleccionada['especificacionesJSON']['tipo_memoria'];
        $ramCompatibles = Product::where('especificacionJSON->tipo_memoria', $tipo_memoria)
                                ->where('ID_Categoria', 4) // Categoría de memorias RAM
                                ->get();

        //return response()->json($ramCompatibles);
        return view('ecommerce.configuradorpc', compact('componentesSeleccionados', 'ramCompatibles'))
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
