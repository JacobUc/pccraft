<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto_Orden extends Model
{
    use HasFactory;
    protected $table = 'producto__ordens';
    protected $primaryKey = 'ID_Producto_Orden';
    protected $fillable = [
        'ID_Producto',
        'ID_Orden',
        'cantidad',
        'calificacion',
        'resena',
        'agregado'
    ];
    public function producto()
    {
        return $this->belongsTo(Product::class, 'ID_Producto', 'ID_Producto');
    }
    public function orden()
    {
        return $this->belongsTo(Orden::class, 'ID_Orden', 'ID_Orden');
    }
}
