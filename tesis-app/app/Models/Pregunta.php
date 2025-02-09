<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    // La tabla asociada a este modelo
    protected $table = 'preguntas';

    // Los campos que se pueden asignar masivamente
    protected $fillable = ['pregunta'];

    // Si no necesitas los campos 'created_at' y 'updated_at', puedes desactivarlos
    // public $timestamps = false;
}

