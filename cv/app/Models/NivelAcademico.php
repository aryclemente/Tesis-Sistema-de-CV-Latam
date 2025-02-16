<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelAcademico extends Model
{
    use HasFactory;

    protected $table = 'niveles_academicos';
    protected $primaryKey = 'idniveles_academicos'; // Definir clave primaria personalizada

    protected $fillable = [
        'nivel_academico',
    ];

    public $timestamps = true; // Habilita timestamps
}
