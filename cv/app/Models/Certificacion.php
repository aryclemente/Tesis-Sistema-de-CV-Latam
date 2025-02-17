<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificacion extends Model
{
    use HasFactory;

    protected $table = 'certificaciones';

    protected $fillable = [
        'institucion',
        'nombre_certificado',
        'fecha_expedicion',
        'user_id',
    ];

    // Deshabilitar los timestamps
    public $timestamps = false;

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'idusers');
    }
}


