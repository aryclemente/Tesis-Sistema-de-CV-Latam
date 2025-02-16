<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienciaLaboralHabilidad extends Model
{
    use HasFactory;

    protected $table = 'experiencia_laboral_habilidad';

    protected $fillable = [
        'experiencia_laboral_id',
        'habilidad_id',
    ];

    public $timestamps = true;
}
