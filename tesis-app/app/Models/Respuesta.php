<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    // La tabla asociada a este modelo
    protected $table = 'respuestas';

    // Los campos que se pueden asignar masivamente
    protected $fillable = ['user_id', 'pregunta_id', 'respuesta'];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el modelo Pregunta
    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class);
    }
}
