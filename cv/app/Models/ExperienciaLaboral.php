<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienciaLaboral extends Model
{
    use HasFactory;

    protected $table = 'experiencias_laborales';

    protected $fillable = [
        'empresa',
        'cargo',
        'fecha_inicio',
        'fecha_fin',
    ];

    // Relación muchos a muchos con Habilidad
    public function habilidades()
    {
        return $this->belongsToMany(Habilidad::class, 'experiencia_laboral_habilidad', 'experiencia_laboral_id', 'habilidad_id');
    }
}
