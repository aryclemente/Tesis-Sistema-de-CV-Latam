<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    // Definimos el nombre de la tabla, si no es plural del modelo (por convención Laravel usa plural)
    protected $table = 'estados';

    // Los campos que pueden ser asignados masivamente
    protected $fillable = ['estado', 'iso_3166_2'];

    // Si no deseas usar los campos `created_at` y `updated_at`, desactívalos:
    // public $timestamps = false;
}
