<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mencion extends Model
{
    use HasFactory;

    // La tabla asociada a este modelo
    protected $table = 'menciones';

    // Los campos que se pueden asignar masivamente
    protected $fillable = ['tipo_mencion'];

    // Si no tienes los campos 'created_at' y 'updated_at' o no quieres usarlos
    // puedes desactivarlos con:
    // public $timestamps = false;
}
