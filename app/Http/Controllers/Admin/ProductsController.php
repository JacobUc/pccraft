<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    // Mostrar todos los productos
    public function index(Request $request)
    {
        $query = Product::query(); // Comenzamos una nueva consulta
    
        // Filtros
        if ($request->filled('fecha')) {
            $query->orderBy('fecha_agregada', $request->fecha);
        }
    
        if ($request->filled('precio')) {
            $query->orderBy('precio', $request->precio);
        }
    
        if ($request->filled('nombre')) {
            $query->orderBy('nombre', $request->nombre);
        }
    
        if ($request->filled('categoria')) {
            $query->where('ID_Categoria', $request->categoria);
        }
    
        // Búsqueda
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('nombre', 'like', '%' . $request->search . '%')
                  ->orWhere('modelo', 'like', '%' . $request->search . '%');
            });
        }
    
        $products = $query->with('category')->get();
    
        $categories = Category::all();
    
        return view('admin.productos.index', compact('products', 'categories'));
    }    
    


    // FORMULARIO BASE PARA CREAR PRODUCTO
    public function create()
    {
        $categories = Category::all(); // CATEGORIAS
        return view('admin.productos.create', compact('categories'));
    }

    // 2/3 COMPLETADO
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'fabricante' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'ID_Categoria' => 'required|exists:categories,ID_Categoria',
            'url_photo' => 'required|image|max:2048',

        ]);
        $data = $request->all();
        if ($request->hasFile('url_photo')) {
            $path = $request->file('url_photo')->store('photos', 'public');
            $data['url_photo'] = $path;
        }
        $data['vendidos'] = 0;
        Product::create($data);

        return redirect()->route('productos.index')->with('success', 'Producto creado con éxito.');
    }

    // BIEN (NO HAY CONFIGURACION DE GUARDAR LAS FOTOS EN SERVER Y JSON)
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.productos.edit', compact('product', 'categories'));
    }

    // GPT
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'fabricante' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'ID_Categoria' => 'required|exists:categories,ID_Categoria',
            'url_photo' => 'nullable|image|max:2048',
        ]);
    
        $product = Product::findOrFail($id);
        $product->fecha_agregada = now()->setTimezone('America/Mexico_City');
    
        if ($request->hasFile('url_photo')) {
            if ($product->url_photo && file_exists(storage_path('app/public/' . $product->url_photo))) {
                unlink(storage_path('app/public/' . $product->url_photo));
            }
    
            $path = $request->file('url_photo')->store('photos', 'public');
            $product->url_photo = $path;
        }
    
        // Actualiza el resto de los campos
        $product->update($request->except('fecha_agregada', 'url_photo'));
    
        return redirect()->route('productos.index')->with('success', 'Producto actualizado con éxito.');
    }
    

    // FORMUALRIO BASE
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado con éxito.');
    }
}