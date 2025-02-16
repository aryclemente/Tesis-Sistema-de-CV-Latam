<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habilidad extends Model
{
    // Nombre de la tabla
    protected $table = 'habilidades';

    // Nombre de la clave primaria
    protected $primaryKey = 'idhabilidades';

    // Si no usas timestamps (created_at, updated_at) en la tabla, pon esto en false
    public $timestamps = false;

    // Columnas que se pueden asignar masivamente
    protected $fillable = [
        'nombre_habilidad'
    ];
}
