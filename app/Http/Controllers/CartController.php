<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class CartController extends Controller
{
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
        // Cargar el carrito del usuario desde la base de datos
        $this->loadCartFromDatabase();

        // Obtener el contenido del carrito desde la sesión actual del usuario
        $cartCollection = Cart::session(auth()->id())->getContent();
        $products = Product::all();
        return view('ecommerce.cart', compact('cartCollection', 'products'))->withTitle('E-COMMERCE STORE | CART');
    }

    public function remove(Request $request)
    {
        Cart::session(auth()->id())->remove($request->ID_producto);

        // Guardar el carrito actualizado en la base de datos
        $this->saveCartToDatabase();

        return redirect()->route('cart.index')->with('success_msg', 'Producto eliminado del carrito');
    }

    public function add(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer',
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer|min:1',
            'modelo' => 'required|string|max:255',
            'fabricante' => 'required|string|max:255',
            'descuento' => 'required|numeric',
            'url_photo' => 'required|array',
            'url_photo.*' => 'required|string',
        ]);

        // Obtener el producto
        $producto = Product::find($validated['id']);

        // Calcular el precio con descuento
        $precioConDescuento = $validated['precio'] - ($validated['precio'] * ($validated['descuento'] / 100));

        // Validar que la cantidad solicitada no exceda el stock disponible
        if ($validated['cantidad'] > $producto->stock) {
            return redirect()->route('cart.index')->with('errors', 'Alcanzaste limite de stock');
        }

        $decodedUrls = json_decode($validated['url_photo'][0], true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return redirect()->back()->withErrors('Error al procesar las URLs de las fotos.');
        }

        Cart::session(auth()->id())->add([
            'id' => $validated['id'],
            'name' => $validated['nombre'],
            'price' => $precioConDescuento,
            'quantity' => $validated['cantidad'],
            'attributes' => [
                'image' => $decodedUrls[0],
                'model' => $validated['modelo'],
                'manufacturer' => $validated['fabricante'],
                'originalPrice' => $validated['precio'],
                'discount' => $validated['descuento'],
            ]
        ]);

        // Guardar el carrito actualizado en la base de datos
        $this->saveCartToDatabase();

        return redirect()->route('cart.index')->with('success', 'Producto agregado al carrito');
    }

    public function update(Request $request)
    {
        // Obtener el producto actual en el carrito
        $item = Cart::session(auth()->id())->get($request->ID_producto);
        $producto = Product::find($item['id']);
        
        // Verificar si se presionó el botón de incremento o decremento
        if ($request->has('increment')) {
            // Incrementar la cantidad, asegurándose de no exceder el stock máximo
            $newQuantity = min($item->quantity + 1, $producto->stock);
        } elseif ($request->has('decrement')) {
            // Decrementar la cantidad, asegurándose de no bajar de 1
            $newQuantity = max(1, $item->quantity - 1);
        } else {
            // Si no se presiona ningún botón, solo actualizar con el valor exacto del input
            $newQuantity = $request->stock;
        }

        // Actualizar la cantidad del producto en el carrito
        Cart::session(auth()->id())->update($request->ID_producto, [
            'quantity' => [
                'relative' => false,
                'value' => $newQuantity,
            ],
        ]);

        // Guardar el carrito actualizado en la base de datos
        $this->saveCartToDatabase();

        // Redireccionar de vuelta al carrito con un mensaje de éxito
        return redirect()->route('cart.index')->with('success_msg', '¡El carrito ha sido actualizado!');
    }

    public function clear()
    {
        Cart::session(auth()->id())->clear();

        // Limpiar el carrito de la base de datos
        $this->saveCartToDatabase();

        return redirect()->route('cart.index')->with('success_msg', 'Carrito limpiado');
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            // Guardar el carrito en la base de datos antes de cerrar sesión
            $this->saveCartToDatabase();

            // Limpiar el carrito de la sesión
            Cart::session(Auth::id())->clear();
        }

        // Cerrar sesión
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Cargar el carrito desde la base de datos después de iniciar sesión
            $this->loadCartFromDatabase();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Método para guardar el carrito en la base de datos
    private function saveCartToDatabase()
    {
        $userId = Auth::id();
        $cartContent = Cart::session($userId)->getContent()->toJson();

        \DB::table('carts')->updateOrInsert(
            ['user_id' => $userId],
            ['content' => $cartContent, 'updated_at' => now()]
        );
    }

    // Método para cargar el carrito desde la base de datos
    private function loadCartFromDatabase()
    {
        $userId = Auth::id();

        // Verificar si el carrito está guardado en la base de datos
        $savedCart = \DB::table('carts')->where('user_id', $userId)->first();

        if ($savedCart) {
            // Restaurar el carrito desde la base de datos
            $cartContent = json_decode($savedCart->content, true);
            Cart::session($userId)->clear();
            foreach ($cartContent as $item) {
                Cart::session($userId)->add($item);
            }
        }
    }
}
