<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExperienciaLaboralXHabilidad extends Model
{
    // Nombre de la tabla
    protected $table = 'experiencia_laboral_x_habilidad';

    // No tiene una clave primaria, ya que es una tabla intermedia
    protected $primaryKey = 'id';

    // Si no usas timestamps (created_at, updated_at) en la tabla, pon esto en false
    public $timestamps = false;

    // Definir las relaciones de muchos a muchos con la tabla 'experiencias_laraborales' y 'habilidades'

    // Relación con 'ExperienciaLaboral'
    public function experienciaLaboral()
    {
        return $this->belongsTo(ExperienciaLaboral::class, 'experiencia_laboral_id', 'idexperiencias_laraborales');
    }

    // Relación con 'Habilidad'
    public function habilidad()
    {
        return $this->belongsTo(Habilidad::class, 'habilidad_id', 'idhabilidades');
    }
}
