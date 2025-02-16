<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $table = 'respuestas';
    protected $primaryKey = 'idrespuesta';
    public $timestamps = false;

    protected $fillable = [
        'respuesta',
        'users_idusers',
        'preguntas_idpreguntas'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_idusers');
    }

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'preguntas_idpreguntas');
    }
}
