<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellidos',
        'rol',
        'estatus',
        'fecha_alta',
        'fecha_baja',
        'fecha_modificacion'
    ];

     // Opcional: Desactivar los timestamps automáticos si usas tus propias columnas de fecha
     public $timestamps = false;

     // Especifica los atributos que deberían ser mutables para formato de fecha
     protected $dates = ['fecha_alta', 'fecha_baja', 'fecha_modificacion'];
}
