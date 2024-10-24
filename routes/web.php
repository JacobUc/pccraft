<?php

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
    // Rutas del perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update.save');


    // Rutas para la gestión de la contraseña
    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');

    // Rutas para la gestión de direcciones
    Route::get('/profile/update', [ProfileController::class, 'showUpdateForm'])->name('profile.update');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update.save');
    
    Route::post('/profile/add-address', [ProfileController::class, 'addAddress'])->name('profile.addAddress');
    Route::delete('/profile/delete-address/{direccion}', [ProfileController::class, 'deleteAddress'])->name('profile.deleteAddress');
    
    // Ruta para seleccionar dirección predeterminada
    Route::patch('/profile/set-default-address/{direccion}', [ProfileController::class, 'setDefaultAddress'])->name('profile.setDefaultAddress');

    // Nueva ruta para editar dirección específica
    Route::get('/profile/edit-address/{direccion}', [ProfileController::class, 'editAddress'])->name('profile.editAddress');
    Route::patch('/profile/edit-address/{direccion}', [ProfileController::class, 'updateAddress'])->name('profile.updateAddress');
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

//Rutas para los pagos
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::get('/checkout/success', [CartController::class, 'success'])->name('checkout.success');
Route::get('/checkout/cancel', [CartController::class, 'cancel'])->name('checkout.cancel');

