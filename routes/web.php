<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Ecommerce\ProductController;
use App\Http\Controllers\Ecommerce\Cart\CartController;
use App\Http\Controllers\Ecommerce\ConfiguradorPCController;

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

// Rutas para el Configurador PC
Route::get('/shop', [ConfiguradorPCController::class, 'shop'])->name('shop');
Route::get('/configuradorpc', [ConfiguradorPCController::class, 'index'])->name('configuradorpc.index');
Route::post('/configuradorpc/add', [ConfiguradorPCController::class, 'add'])->name('configuradorpc.add');
Route::post('/configuradorpc/addAll', [ConfiguradorPCController::class, 'addAll'])->name('configuradorpc.addAll');
Route::post('/configuradorpc/remove', [ConfiguradorPCController::class, 'remove'])->name('configuradorpc.remove');
Route::post('/configuradorpc/removeAll', [ConfiguradorPCController::class, 'removeAll'])->name('configuradorpc.removeAll');
Route::post('/logout', [ConfiguradorPCController::class, 'logout'])->name('logout');