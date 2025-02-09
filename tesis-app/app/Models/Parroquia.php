<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parroquia extends Model
{
    use HasFactory;

    // Definimos el nombre de la tabla, si no es plural del modelo (por convención Laravel usa plural)
    protected $table = 'parroquias';

    // Los campos que pueden ser asignados masivamente
    protected $fillable = ['parroquia', 'municipio_id'];

    // Relación con el modelo Municipio (cada parroquia pertenece a un municipio)
    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id');
    }

    // Si no deseas usar los campos `created_at` y `updated_at`, desactívalos:
    // public $timestamps = false;
}
