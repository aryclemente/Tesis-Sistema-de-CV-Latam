<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication; // Asegúrate de importar el modelo Publication

class HomeController extends Controller
{
    public function showHomePage()
    {
        // Obtener solo 4 publicaciones aleatorias de la categoría 'Servicios' y estado 'publicado'
        $publications = Publication::where('categoria', 'Servicios')
                                    ->where('estado', 'publicado')  // Filtrar por estado 'publicado'
                                    ->inRandomOrder()               // Ordenarlas aleatoriamente
                                    ->take(4)                       // Limitar a 4 publicaciones
                                    ->get();

        return view('cms.HomePage', compact('publications'));
    }
}
