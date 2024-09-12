<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Constructor para aplicar el middleware de autenticación a todos los métodos
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function shop()
    {
        $products = Product::all();
        return view('welcome')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $products]);
    }

    public function cart()
    {
        // Obtener el contenido del carrito usando la misma sesión del usuario
        $cartCollection = Cart::session(auth()->id())->getContent();
        return view('ecommerce.cart')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection]);
    }

    public function remove(Request $request)
    {
        Cart::session(auth()->id())->remove($request->ID_producto);
        return redirect()->route('cart.index')->with('success_msg', 'Producto eliminado del carrito');
    }

    public function add(Request $request)
    {
        // Validación de los datos recibidos
        $validated = $request->validate([
            'id' => 'required|integer',
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer|min:1',
            'url_photo' => 'required|array',
            'url_photo.*' => 'required|string',
        ]);

        // Decodificar la cadena JSON de 'url_photo'
        $decodedUrls = json_decode($validated['url_photo'][0], true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return redirect()->back()->withErrors('Error al procesar las URLs de las fotos.');
        }

        // Utilizar una sesión personalizada para cada usuario
        Cart::session(auth()->id())->add([
            'id' => $validated['id'],
            'name' => $validated['nombre'],
            'price' => $validated['precio'],
            'quantity' => $validated['cantidad'],
            'attributes' => [
                'image' => $decodedUrls[0], // Usamos la primera foto del array decodificado
            ]
        ]);

        return redirect()->route('cart.index')->with('success', 'Producto agregado al carrito');
    }

    public function update(Request $request)
    {
        Cart::session(auth()->id())->update($request->ID_producto, [
            'quantity' => [
                'relative' => false,
                'value' => $request->stock
            ],
        ]);

        return redirect()->route('cart.index')->with('success_msg', '¡El carrito ha sido actualizado!');
    }

    public function clear()
    {
        Cart::session(auth()->id())->clear();
        return redirect()->route('cart.index')->with('success_msg', 'Carrito limpiado');
    }
}
