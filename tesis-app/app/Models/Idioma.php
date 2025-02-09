<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    use HasFactory;

    // La tabla asociada a este modelo
    protected $table = 'idiomas';

    // Los campos que se pueden asignar masivamente
    protected $fillable = ['idioma', 'nivel'];

    // Si no deseas usar los campos de timestamps 'created_at' y 'updated_at'
    // puedes desactivarlos con:
    // public $timestamps = false;
}
