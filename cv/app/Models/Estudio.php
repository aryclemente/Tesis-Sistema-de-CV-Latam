<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudio extends Model
{
    use HasFactory;

    protected $table = 'estudios';
    protected $primaryKey = 'idestudios'; // Clave primaria personalizada

    protected $fillable = [
        'estudios_logrados',
        'user_id',
        'nivel_academico_id',
        'mencion_id',
    ];

    public $timestamps = false; // Habilita timestamps

    // Relaciones
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id', 'idusers');
    }

    public function nivelAcademico()
    {
        return $this->belongsTo(NivelAcademico::class, 'nivel_academico_id', 'idniveles_academicos');
    }

    public function mencion()
    {
        return $this->belongsTo(Mencion::class, 'mencion_id', 'idmenciones');
    }
}
