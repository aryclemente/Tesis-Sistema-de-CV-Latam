<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificacion extends Model
{
    protected $table = 'certificaciones';
    protected $primaryKey = 'idcertificaciones';
    public $timestamps = false;

    protected $fillable = [
        'institucion',
        'nombre_institucion',
        'fecha_expedicion',
        'user_id',
    ];

    // Relación con User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'idusers');
    }
}
