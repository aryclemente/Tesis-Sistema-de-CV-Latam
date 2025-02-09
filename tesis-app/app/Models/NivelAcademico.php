<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelAcademico extends Model
{
    use HasFactory;

    // La tabla asociada a este modelo
    protected $table = 'niveles_academicos';

    // Los campos que se pueden asignar masivamente
    protected $fillable = ['nivel_academico'];

    // Si no tienes los campos 'created_at' y 'updated_at' o no quieres usarlos
    // puedes desactivarlos con:
    // public $timestamps = false;
}
