<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductsController;

// Rutas para el Panel de Admin
Route::get('/', [HomeController::class, 'index']);

Route::get('caquita', function(){
    return 'Caquita';
});

// Productos (Crear Controlador)
Route::resource('productos', ProductsController::class)->names([
    'index' => 'admin-productos',  // Opcional: Nombre de ruta personalizado
]);
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('productos', ProductsController::class);
});
Route::get('/admin/productos', [ProductsController::class, 'index'])->name('productos.index');
// Pedidos (Crear Controlador)
Route::get('pedidos', function(){
    return view('admin.pedidos.index');
})->name('admin-pedidos');
