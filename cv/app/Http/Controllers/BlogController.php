<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function showBlog()
    {
        // Obtener todas las publicaciones con estado 'publicado' o 'programado',
        // excluyendo las categorías 'Sobre Nosotros' y 'Servicios',
        // y cuya fecha de publicación sea menor o igual a la fecha actual,
        // sin incluir las publicaciones futuras.
        $publications = Publication::with('user') // 'user' si también lo necesitas
        ->whereIn('estado', ['publicado', 'programado'])
        ->whereNotIn('categoria', ['Sobre Nosotros', 'Servicios'])  // Filtrar según categorías
        ->where('fecha_publicacion', '<=', Carbon::now())
        ->inRandomOrder()
        ->paginate(6);// Mostrar 6 publicaciones por página

        return view('cms.Blog', compact('publications'));
    }

    public function showPublication($id)
    {
        // Obtener la publicación por ID
        $publication = Publication::findOrFail($id);

        // Pasar la publicación a la vista
        return view('cms.Publication', compact('publication'));
    }
}
