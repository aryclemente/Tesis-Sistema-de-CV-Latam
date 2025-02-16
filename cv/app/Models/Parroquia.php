<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parroquia extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'parroquias';

    // Nombre de la clave primaria
    protected $primaryKey = 'idparroquias';

    // Desactivar los timestamps si no los estás utilizando
    public $timestamps = false;

    // Columnas que pueden ser asignadas masivamente
    protected $fillable = [
        'parroquia',
        'municipios_idmunicipios'
    ];

    // Relación con el modelo Municipio (Una parroquia pertenece a un municipio)
    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipios_idmunicipios', 'idmunicipios');
    }
}
