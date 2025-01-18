<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'idusers';
    public $timestamps = false;

    protected $casts = [
        'cedula' => 'int',
        'nacionalidad_idnacionalidad' => 'int',
        'roles_idroles' => 'int',
    ];

    protected $hidden = [
        'password',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'cedula',
        'user_name',
        'address',
        'email',
        'facebook',
        'instagram',
        'x',
        'tiktok',
        'descripcion',
        'password',
        'nacionalidad_idnacionalidad',
        'roles_idroles',
    ];

    // Relación con Nacionalidad
    public function nacionalidad()
    {
        return $this->belongsTo(Nacionalidad::class, 'nacionalidad_idnacionalidad');
    }

    // Relación con Rol
    public function role()
    {
        return $this->belongsTo(Role::class, 'roles_idroles');
    }

    // Relación con Preguntas a través de Respuestas (pivot)
    public function preguntas()
    {
        return $this->belongsToMany(Pregunta::class, 'respuestas', 'users_idusers', 'preguntas_idpreguntas')
            ->withPivot('respuesta');
    }

    // Relación uno-a-muchos con Publicaciones
    public function publications()
    {
        return $this->hasMany(Publication::class, 'users_idusers');
    }

    // Relación uno-a-muchos con Páginas
    public function pages()
    {
        return $this->hasMany(Page::class, 'users_idusers');
    }
        // En el modelo User

    public function comments()
    {
        return $this->hasMany(Comment::class, 'users_idusers', 'idusers');
    }

}
