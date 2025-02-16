<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'municipios';

    // Nombre de la clave primaria
    protected $primaryKey = 'idmunicipios';

    // Desactivar los timestamps, ya que no estamos usando created_at y updated_at
    public $timestamps = false;

    // Columnas que pueden ser asignadas masivamente
    protected $fillable = [
        'municipio',
        'estados_idestados'
    ];

    // Relación con el modelo Estado (Un municipio pertenece a un estado)
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estados_idestados', 'idestados');
    }
}
