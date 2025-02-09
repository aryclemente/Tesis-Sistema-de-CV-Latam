<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    // Definimos el nombre de la tabla, si no es plural del modelo (por convención Laravel usa plural)
    protected $table = 'ciudades';

    // Los campos que pueden ser asignados masivamente
    protected $fillable = ['ciudad', 'capital', 'estado_id'];

    // Relación con el modelo Estado (ya que cada ciudad pertenece a un estado)
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    // Si no deseas usar los campos `created_at` y `updated_at`, desactívalos:
    // public $timestamps = false;
}
