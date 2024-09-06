<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonData = json_decode(file_get_contents('C:\Users\allen\Documents\Progreso Uady\Noveno-semestre\Administración-2\productos-1.json'), true);

        foreach ($jsonData['productos'] as $productData) {
            Product::create([
                'nombre' => $productData['nombre'],
                'modelo' => $productData['modelo'],
                'fabricante' => $productData['fabricante'],
                'descripcion' => $productData['descripcion'],
                'precio' => $productData['precio'],
                'descuento' => $productData['descuento'],
                'stock' => $productData['stock'],
                'ID_Categoria' => $productData['ID_categoria'],
                'especificacionJSON' => json_encode($productData['especificacionesJSON']),
                'url_photo' => json_encode($productData['url_photo']),
                'vendidos' => 0,
            ]);
        }
    }
}
