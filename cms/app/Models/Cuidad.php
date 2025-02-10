<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'cuidades';

    // Nombre de la clave primaria
    protected $primaryKey = 'idcuidades';

    // Desactivar los timestamps si no los estás utilizando
    public $timestamps = false;

    // Columnas que pueden ser asignadas masivamente
    protected $fillable = [
        'cuidad',
        'capital',
        'estados_idestados'
    ];

    // Relación con el modelo Estado (Una ciudad pertenece a un estado)
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estados_idestados', 'idestados');
    }
}
