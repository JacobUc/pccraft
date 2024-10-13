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
