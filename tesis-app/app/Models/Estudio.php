<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudio extends Model
{
    use HasFactory;

    // La tabla asociada a este modelo
    protected $table = 'estudios';

    // Los campos que se pueden asignar masivamente
    protected $fillable = [
        'estudios_logrados',
        'user_id',
        'nivel_academico_id',
        'mencion_id'
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el modelo NivelAcademico
    public function nivelAcademico()
    {
        return $this->belongsTo(NivelAcademico::class);
    }

    // Relación con el modelo Mencion
    public function mencion()
    {
        return $this->belongsTo(Mencion::class);
    }
}

