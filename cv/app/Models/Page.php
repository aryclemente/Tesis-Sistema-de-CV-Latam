<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'slug',
        'status',
        'description',
        'users_idusers',
    ];

    // Asegurarte de que se gestionen los timestamps
    public $timestamps = true; // Esto es por defecto, pero puedes agregarlo explícitamente si lo prefieres

   // Relación con el modelo User
   public function user()
   {
       return $this->belongsTo(User::class, 'users_idusers'); // 'users_idusers' es la clave foránea
   }
}
