<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mencion extends Model
{
    use HasFactory;

    protected $table = 'menciones';
    protected $primaryKey = 'idmenciones'; // Definir clave primaria personalizada

    protected $fillable = [
        'tipo_mencion',
    ];

    public $timestamps = true; // Habilita timestamps
}

