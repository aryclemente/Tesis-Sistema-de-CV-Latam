<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habilidad extends Model
{
    use HasFactory;

    protected $table = 'habilidades';

    protected $fillable = [
        'nombre_habilidad',
    ];

    // Relación muchos a muchos con ExperienciaLaboral
    public function experienciasLaborales()
    {
        return $this->belongsToMany(ExperienciaLaboral::class, 'experiencia_laboral_habilidad', 'habilidad_id', 'experiencia_laboral_id');
    }
}
