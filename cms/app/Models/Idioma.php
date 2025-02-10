<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    protected $table = 'idiomas';
    protected $primaryKey = 'ididiomas';
    public $timestamps = false;

    protected $fillable = [
        'nombre_idioma',
        'nivel_idioma',
    ];
}
