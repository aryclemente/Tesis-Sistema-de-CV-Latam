<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{

    protected $table = 'estados';

    protected $primaryKey = 'idestados';

    public $timestamps = false;

    protected $fillable = [
        'estado',
        'iso_3166_2'
    ];

}
