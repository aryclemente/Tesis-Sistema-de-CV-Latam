<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudio extends Model
{
    protected $table = 'estudios';
    protected $primaryKey = 'idestudios';
    public $timestamps = false;

    protected $fillable = [
        'institucion',
        'nombre_institucion',
        'fecha_inicio',
        'fecha_fin',
        'user_id',
        'niveles_academicos_idniveles_academicos',
        'menciones_idmenciones',
    ];

    // Relación con Usuario (User)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relación con Nivel Académico
    public function nivelAcademico()
    {
        return $this->belongsTo(NivelAcademico::class, 'niveles_academicos_idniveles_academicos');
    }

    // Relación con Mención
    public function mencion()
    {
        return $this->belongsTo(Mencion::class, 'menciones_idmenciones');
    }
}
