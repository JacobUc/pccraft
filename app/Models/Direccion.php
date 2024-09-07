<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;
    protected $table = 'direccions';
    protected $primaryKey = 'ID_Direccion';
    protected $fillable = [
        'ID_Direccion',
        'ID_Usuario',
        'ciudad',
        'codigo_postal',
        'calle_principal',
        'cruzamientos',
        'numero_exterior',
        'numero_interior',
        'detalles'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'ID_Usuario');
    }
}
