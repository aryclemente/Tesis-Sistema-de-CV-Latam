<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mencion extends Model
{
    protected $table = 'menciones';
    protected $primaryKey = 'idmenciones';
    public $timestamps = false;

    protected $fillable = [
        'nombre_mencion',
    ];
}
