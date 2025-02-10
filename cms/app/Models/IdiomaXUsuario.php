<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdiomaXUsuario extends Model
{
    protected $table = 'idiomas_x_usuario';
    public $timestamps = false;

    protected $fillable = [
        'idioma_id',
        'user_id',
    ];

    // Relación con Idioma
    public function idioma()
    {
        return $this->belongsTo(Idioma::class, 'idioma_id', 'ididiomas');
    }

    // Relación con Usuario
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'idusers');
    }
}
