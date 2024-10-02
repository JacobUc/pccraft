<?php

use App\Http\Controllers\Ecommerce\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
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

// Probando hasta ver si funciona.
// Mostrar la vista estática de preguntas frecuentes.
Route::get('/soporte', function () {
    return view('support/faqs'); // Asegúrate de que la vista esté en resources/views/faqs.blade.php
})->name('faqs.index');

Route::get('/comentario', function () {
    return view('ecommerce/comment');
})->name('comment.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';
