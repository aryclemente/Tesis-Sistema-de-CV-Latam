<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserIdioma extends Model
{
    use HasFactory;

    // La tabla asociada a este modelo
    protected $table = 'user_idiomas';

    // Los campos que se pueden asignar masivamente
    protected $fillable = ['user_id', 'idioma_id'];

    // Si no deseas usar los timestamps 'created_at' y 'updated_at'
    // puedes desactivarlos con:
    // public $timestamps = false;
}
