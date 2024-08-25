<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_producto';
    protected $fillable = [
        'nombre',
        'modelo',
        'fabricante',
        'descripcion',
        'precio',
        'descuento',
        'stock',
        'fecha_agregada',
        'ID_Categoria',
        'especificacionJSON',
        'url_photo',
        'vendidos',
    ];
    public $timestamps = false;
    // Relación con la tabla "categories"
    public function category()
    {
        return $this->belongsTo(Category::class, 'ID_Categoria', 'ID_Categoria');
    }
}

            