<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserIdioma extends Model
{
    use HasFactory;

    protected $table = 'user_idiomas';
    protected $primaryKey = 'iduser_idiomas'; // Clave primaria personalizada

    protected $fillable = [
        'user_id',
        'idioma_id',
    ];

    public $timestamps = true; // Habilita timestamps

    // Relación con el modelo Usuario
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'idusers');
    }

    // Relación con el modelo Idioma
    public function idioma()
    {
        return $this->belongsTo(Idioma::class, 'idioma_id', 'ididiomas');
    }
}
