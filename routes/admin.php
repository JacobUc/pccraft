<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

// Rutas para el Panel de Admin
Route::get('/', [HomeController::class, 'index']);

// Productos (Crear Controlador)
Route::get('productos', function(){
    return view('admin.productos.index');
} )->name('admin-productos');


// Pedidos (Crear Controlador)
Route::get('pedidos', function(){
    return view('admin.pedidos.index');
} )->name('admin-pedidos');