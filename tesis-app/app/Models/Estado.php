<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $table = 'estados';
    protected $fillable = ['estado', 'iso_3166_2'];

    public function ciudades()
    {
        return $this->hasMany(Ciudad::class);
    }

    public function municipios()
    {
        return $this->hasMany(Municipio::class);
    }
}


