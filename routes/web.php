<?php

use App\Http\Controllers\Ecommerce\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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

// Rutas creadas para el Frontend del E-commerce
// Route::get('productos', function( ){ return 'Hola'; } )->name('productos');
// Route::get('nosotros', function( ){ return 'Hola'; } )->name('nosotros');
// Route::get('soporte', function( ){ return 'Hola'; } )->name('soporte');
// Route::get('pedidos', function( ){ return 'Hola'; } )->name('pedidos');

// Mostrar los productos individualmente
Route::get('/productos/{product}', [ProductController::class, 'index'] );


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';
