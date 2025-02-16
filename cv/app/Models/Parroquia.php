<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parroquia extends Model
{
    use HasFactory;

    protected $table = 'parroquias';

    protected $fillable = [
        'parroquia',
        'municipio_id',
    ];

    public $timestamps = false;

    // Relación con Municipio
    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id');
    }
}
