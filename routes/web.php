<?php

use App\Http\Controllers\Ecommerce\BuscadorProductsController;
use App\Http\Controllers\Ecommerce\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Ecommerce\Cart\CartController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    
})->name('home');

// Buscador productos
Route::get('buscador', [BuscadorProductsController::class, 'index'])->name('productos.buscador');
// Producto segun categorias
Route::get('productos/categoria/{category}', [BuscadorProductsController::class, 'categorias'])->name('productos.categorias');

// Mostrar los productos individualmente
Route::get('/productos/{product}', [ProductController::class, 'index'] );


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Probando hasta ver si funciona.
// Mostrar la vista estática de preguntas frecuentes.
Route::get('/soporte', function () {
    return view('support/faqs'); // Asegúrate de que la vista esté en resources/views/faqs.blade.php
})->name('faqs.index');

Route::get('/comentario', function () {
    return view('ecommerce/comment');
})->name('comment.index');


// Sesiones de usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});
require __DIR__.'/auth.php';

// Rutas para el carrito de compras
Route::get('/shop', [CartController::class, 'shop'])->name('shop');
Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/logout', [CartController::class, 'logout'])->name('logout');