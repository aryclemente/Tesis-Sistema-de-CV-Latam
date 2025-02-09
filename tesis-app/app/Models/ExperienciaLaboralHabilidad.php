<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienciaLaboralHabilidad extends Model
{
    use HasFactory;

    // La tabla asociada a este modelo
    protected $table = 'experiencia_laboral_habilidad'; // Asegúrate de que coincida con el nombre de la tabla

    // Si no estás usando un campo `id` como clave primaria (puedes desactivarlo si lo deseas)
    public $incrementing = true;

    // Los campos 'created_at' y 'updated_at' se gestionan automáticamente
    public $timestamps = true;

    // Si solo quieres permitir ciertas columnas para asignación masiva (si las necesitas)
    protected $fillable = [
        'experiencia_laboral_id',
        'habilidad_id'
    ];

    // Relación con ExperienciaLaboral (pertenece a muchos)
    public function experienciaLaboral()
    {
        return $this->belongsTo(ExperienciaLaboral::class, 'experiencia_laboral_id');
    }

    // Relación con Habilidad (pertenece a muchos)
    public function habilidad()
    {
        return $this->belongsTo(Habilidad::class, 'habilidad_id');
    }
}
