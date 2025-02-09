<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    // La tabla asociada a este modelo
    protected $table = 'users';

    // Habilitar el uso de asignación masiva (fillable)
    protected $fillable = [
        'first_name', 'last_name', 'date_of_birth', 'cedula', 'user_name', 'email', 'password', 'genero',
        'nacionalidad_id', 'role_id', 'ciudad_id', 'experiencia_laboral_id'
    ];

    // Para evitar problemas de claves primarias no convencionales (si la tabla usa 'id')
    public $incrementing = true;

    // Si no tienes los campos 'created_at' y 'updated_at' (o quieres desactivarlos)
    public $timestamps = true;

    // Relaciones
    public function nacionalidad()
    {
        return $this->belongsTo(Nacionalidad::class);
    }

    public function rol()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }

    public function experienciaLaboral()
    {
        return $this->belongsTo(ExperienciaLaboral::class, 'experiencia_laboral_id');
    }
}
