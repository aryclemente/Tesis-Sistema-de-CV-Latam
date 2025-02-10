<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    // Especifica el nombre de la tabla en la base de datos
    protected $table = 'cuidades'; // Cambia a 'ciudades' si es necesario

    // Especifica la clave primaria
    protected $primaryKey = 'idcuidades';

    // Desactiva timestamps si la tabla no tiene created_at y updated_at
    public $timestamps = false;

    // Columnas que pueden ser asignadas masivamente
    protected $fillable = [
        'cuidad',  // Cambia a 'ciudad' si es necesario
        'capital',
        'estados_idestados'
    ];

    // Relación con el modelo Estado (Una ciudad pertenece a un estado)
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estados_idestados', 'idestados');
    }
}
