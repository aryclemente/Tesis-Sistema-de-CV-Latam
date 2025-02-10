<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExperienciaLaboral extends Model
{
    protected $table = 'experiencias_laraborales';

    protected $primaryKey = 'idexperiencias_laraborales';

    public $timestamps = true;

    protected $fillable = [
        'empresa',
        'cargo',
        'fecha_inicio',
        'fecha_fin'
    ];

}
