<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $table = 'estados'; // Nombre de la tabla

    protected $fillable = [
        'estado',
        'iso_3166_2',
    ];

    public $timestamps = false; // Si no tienes created_at y updated_at

    
}
