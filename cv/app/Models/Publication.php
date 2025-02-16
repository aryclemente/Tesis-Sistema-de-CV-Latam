<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $table = 'publications';
    protected $primaryKey = 'idpublications';
    public $timestamps = false;

    protected $fillable = [
        'title',
        'content',
        'image',
        'fecha_creacion',
        'fecha_publicacion',
        'categoria',
        'estado',
        'users_idusers',
    ];

    protected $casts = [
        'fecha_creacion' => 'datetime',
        'fecha_publicacion' => 'datetime',
    ];

    // Relación corregida: Una publicación pertenece a un único usuario
    public function user()
    {
        return $this->belongsTo(User::class, 'users_idusers');
    }
}
