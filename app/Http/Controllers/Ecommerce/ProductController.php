<?php

namespace App\Http\Controllers\Ecommerce;

use DateTime;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //
    public function index(Product $product)
{
    $user = User::find( auth()->id() );

    // Calcular el precio final
    $precioFinal = (100 - $product->descuento) * 0.01 * $product->precio ;
    $product->precio_final = number_format($precioFinal, 2, '.', ',');

    // Parse JSON Especificaciones
    $product->especificaciones = json_decode($product->especificacionJSON, true);

    $filtro = request('filtro', 'mas-recientes'); // Por defecto 'mas-recientes'

    // Obtener comentarios ordenados según el filtro
    $comentarios = $product->reviews()
        ->with('productoOrdens.orden.usuario')
        ->when($filtro == 'mas-recientes', function ($query) {
            $query->orderBy('fecha', 'desc'); // Ordenar de más reciente a menos reciente
        })
        ->when($filtro == 'menos-recientes', function ($query) {
            $query->orderBy('fecha', 'asc'); // Ordenar de menos reciente a más reciente
        })
        ->get();
        

    $product->comentarios = $comentarios;
    $product->avgRaiting = $product->reviews()->avg('calificacion') ?? 0;

    // Si es una solicitud AJAX, devolver solo el HTML de los comentarios
    if (request()->ajax()) {
        return response()->json([
            'html' => view('ecommerce.product', compact('product'))->render()
        ]);
    }
    
    // Inicializar valores de compra y reseña
    $product->comprado = false;
    $product->resenado = false;
    $product->ultimaOrdenEntregada = null;

    if ($user) {
        $idProducto = $product->ID_producto;
    
        // Verificar si el usuario ha comprado el producto
        $productoOrden = $user->ordens()
            ->whereHas('productos', function ($query) use ($idProducto) {
                $query->where('producto__ordens.ID_Producto', $idProducto);
            })
            ->with(['productos' => function ($query) use ($idProducto) {
                $query->where('producto__ordens.ID_Producto', $idProducto);
            }])->get();
    
        // Verificar si el producto ha sido comprado
        if ($productoOrden->isNotEmpty()) {
            $product->comprado = true;
    
            // Verificar si hay una reseña asociada en la tabla pivote
            foreach ($productoOrden as $orden) {
                $productoComprado = $orden->productos->first();
                if ($productoComprado && $orden->estado === 'entregado' && !$productoComprado->pivot->ID_Review) {
                    $product->ultimaOrdenEntregada = $orden; // Guardamos la orden entregada
                    $product->resenado = false;
                    break;
                } else {
                    $product->resenado = true;
                }
            }
        }
    }

    return view('ecommerce.product')->with('product', $product);
}

public function show($id)
{
    $product = Producto::findOrFail($id);

    // Obtener el valor del filtro de la solicitud
    $filtro = request('filtro', 'mas-recientes'); // Por defecto 'mas-recientes'

    // Obtener comentarios ordenados según el filtro
    $comentarios = $product->reviews()
        ->with('productoOrdens.orden.usuario')
        ->when($filtro == 'mas-recientes', function ($query) {
            $query->orderBy('fecha', 'desc'); // Ordenar de más reciente a menos reciente
        })
        ->when($filtro == 'menos-recientes', function ($query) {
            $query->orderBy('fecha', 'asc'); // Ordenar de menos reciente a más reciente
        })
        ->get();

    $product->comentarios = $comentarios;

    if (request()->ajax()) {
        // Si es una solicitud AJAX, devolver solo la sección de comentarios renderizada
        return view('ecommerce.product', compact('product'))->renderSections()['comentarios-container'];
    }

    // Si no es AJAX, cargar la vista completa
    return view('ecommerce.product')->with('product', $product);
}


}
