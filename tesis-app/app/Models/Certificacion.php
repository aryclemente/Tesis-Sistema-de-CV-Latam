<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificacion extends Model
{
    use HasFactory;

    // La tabla asociada a este modelo
    protected $table = 'certificaciones';

    // Los campos que se pueden asignar masivamente
    protected $fillable = [
        'institucion', 'nombre_institucion', 'fecha_expedicion', 'user_id'
    ];

    // La relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
