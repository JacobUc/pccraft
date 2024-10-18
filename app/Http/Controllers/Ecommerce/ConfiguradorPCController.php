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

    public function index()
    {
        //$user = User::find( auth()->id() );
        // Verificar si los datos ya están en la sesión
        $this->componentesQuery = session('componentesQuery', []);
        $this->componentesSeleccionados = session('componentesQuery', []);
    
        // Si la sesión está vacía, obtenemos los productos
        if (empty($this->componentesQuery)) {
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
    
            // Guardar en la sesión el array de componentesQuery
            session(['componentesQuery' => $this->componentesQuery]);
        }
    
        // Retornar la vista con el array de componentes query
        return view('ecommerce.configuradorpc', ['componentesQuery' => $this->componentesQuery])
            ->withTitle('E-COMMERCE STORE | CONFIGURADOR PC');
    }
    
    
    public function add(Request $request)
    {
        // Obtener los arrays de la sesión
        $this->componentesSeleccionados = session('componentesSeleccionados', []);
        $this->componentesQuery = session('componentesQuery', []);
    
        $id = $request->input('id');
        $categoria = $request->input('categoria'); // Procesador, tarjetaMadres, memoriasRAM
        $productoSeleccionado = Product::find($id); // Obtén el producto seleccionado por ID


        // Decodificar el JSON
        $especificacion = json_decode($productoSeleccionado->especificacionJSON, true);
    
        // Verifica la categoría del componente
        if ($categoria === "Procesador") {
            // Si no hay procesador seleccionado, agregar nuevo procesador al array
            $this->componentesSeleccionados['procesador'] = $productoSeleccionado;
            // Verifica si el procesador ya está seleccionado en el array de componentes Tarjeta Madre y decide actualizar compatibilidad
            if (empty($this->componentesSeleccionados['Tarjeta Madre'])) {
                // Obtener el socket del procesador
                $socket = $especificacion['socket'];
                // Actualizar las tarjetas madre compatibles basadas en el socket del procesador
                $tarjetasMadreCompatibles = Product::where('especificacionJSON', 'LIKE', '%"socket":"'.$socket.'"%')
                                        ->where('ID_Categoria', 3) // Categoría de tarjetas madre
                                        ->get();
                //dd($tarjetasMadreCompatibles);
                $this->componentesQuery['tarjetaMadres'] = $tarjetasMadreCompatibles;
            }

            if (empty($this->componentesSeleccionados['Memoría RAM'])) {
                // Actualizar memorias RAM compatibles basadas en el tipo de memoria
                $tipo_memoria = $especificacion['tipo_RAM'];
                $ramCompatibles = Product::where('especificacionJSON', 'LIKE', '%"tipo":"'.$tipo_memoria.'"%')
                                        ->where('ID_Categoria', 4) // Categoría de memorias RAM
                                        ->get();
                // Actualizamos el array de componentes query con los componentes compatibles con tipo_RAM 
                //dd($ramCompatibles);
                $this->componentesQuery['memoriasRAM'] = $ramCompatibles;
            } 

            if (empty($this->componentesSeleccionados['Gabinete'])) {

                // Obtener todos los gabinetes
                $gabinetes = Product::whereHas('category', function ($query) {
                    $query->where('ID_Categoria', 6); // Filtrar por categoría "Gabinetes"
                })->get();
                $this->componentesQuery['gabinetes'] = $gabinetes;
            } 
            // Guardar los arrays actualizados en la sesión
            session(['componentesSeleccionados' => $this->componentesSeleccionados]);
            session(['componentesQuery' => $this->componentesQuery]);
        }
        //dd($this->componentesSeleccionados);
        //dd($this->componentesQuery);
        // Retornar la vista con los componentes seleccionados y query de Componentes Actualizado
        return view('ecommerce.configuradorpc', [
            'componentesQuery' => $this->componentesQuery, 
            'componentesSeleccionados' => $this->componentesSeleccionados
        ])->with('title', 'E-COMMERCE STORE | CONFIGURADOR PC');
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
