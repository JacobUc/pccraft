<?php

namespace App\Http\Controllers;
use Cart;


use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function shop()
    {
        $products = Product::all();
        //d($products);
        return view('welcome')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $products]);
    }

    public function cart()  {
        $cartCollection = \Cart::getContent();
        //dd($cartCollection);
        return view('ecommerce.cart')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection]);
    }

    public function remove(Request $request)
    {
        Cart::remove($request->ID_producto);

        return redirect()->route('cart.index')->with('success_msg', 'Producto eliminado del carrito');
    }

    public function add(Request $request)
    {
        // Validación de los datos recibidos
        $validatedData = $request->validate([
            'id' => 'required|integer|exists:products,ID_producto',  // El ID debe existir en la tabla de productos
            'nombre' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:1',  // Cantidad mínima de 1
            'precio' => 'required|numeric|min:0',
            'url_photo' => 'required|array', // Debe ser un array (ya que almacenas hasta 3 fotos)
            'url_photo.*' => 'url', // Cada foto debe ser una URL válida
        ]);
    
        // Si la validación pasa, agregamos el producto al carrito
        \Cart::add(array(
            'id' => $validatedData['id'],
            'name' => $validatedData['nombre'],
            'price' => $validatedData['precio'],
            'quantity' => $validatedData['cantidad'],
            'attributes' => array(
                'image' => $validatedData['url_photo'][0], // Usamos la primera foto del array
            )
        ));
    
        // Redirigir o responder con éxito
        return redirect()->route('cart.index')->with('success', 'Producto agregado al carrito');
    }
    




    public function update(Request $request){
        \Cart::update($request->ID_producto,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->stock
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', '¡El carrito ha sido actualizado!');
    }

    public function clear()
    {
        Cart::clear();

        return redirect()->route('cart.index')->with('success_msg', 'Carrito limpiado');
    }
}
