<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;
    protected $table = 'ordens';
    protected $primaryKey = 'ID_Orden';
    protected $fillable = [
        'ID_Usuario',
        'fecha',
        'total',
        'estado',
        'agregada'
    ];
    public function usuario()
    {
        return $this->belongsTo(User::class, 'ID_Usuario');
    }
    public function productos()
    {
        return $this->hasMany(Producto_Orden::class, 'ID_Orden', 'ID_Orden');
    }
}
