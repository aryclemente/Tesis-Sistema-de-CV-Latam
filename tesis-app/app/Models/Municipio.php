<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $table = 'municipios';
    protected $fillable = ['municipio', 'estado_id', 'ciudad_id'];

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'ciudad_id');
    }

    public function parroquias()
    {
        return $this->hasMany(Parroquia::class);
    }
}


