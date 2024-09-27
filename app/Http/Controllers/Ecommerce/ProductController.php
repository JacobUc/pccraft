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

        // Traer todos los comentarios del producto
        $comentarios = $product->reviews()->with('productoOrdens.orden.usuario')->get();
        $product->comentarios = $comentarios;
        
        // Calcular calificacion promedio
        $product->avgRaiting = $product->reviews()->avg('calificacion');

        // !COMPROBACIONES (SI EL USER HA COMPRADO EL PRODUCTO)
        // Si el usuario ha iniciado sesion, verificamos si ha comprado el producto y si ha hecho un review
        $productoOrden = null;
        if($user){
            $idProducto = $product->ID_producto;
            // Verificar si el usuario ha comprado el producto
            $productoOrden = $user->ordens()
                ->whereHas('productos', function ($query) use ($idProducto) {
                    $query->where('ID_Producto', $idProducto);
                })
                ->with(['productos' => function ($query) use ($idProducto) {
                    $query->where('ID_Producto', $idProducto);
                }])->get();
            $product->comprado = !empty($productoOrden->first());

            // Ver si hay una review asociada
            // Por cada orden que contenga el producto con el 'idProducto', iteramos para verificar
            // que al menos se ha calificado una vez
            foreach( $productoOrden as $producto ){
                // Recuperamos el producto buscado de la orden
                $productoComprado = $producto->productos[0]; // Se supone que solo se puede comprar 1 vez por orden
                if( $productoComprado->review ){
                    $product->resenado = true;
                    break;
                }
            }
        }

        return view('ecommerce.product')->with('product', $product);
    }
}
