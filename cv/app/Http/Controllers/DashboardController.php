<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Verificar si el usuario tiene el rol adecuado
        if (Auth::user()->roles_idroles !== 1) {
            return redirect()->route('login')->with('error', 'No tienes permiso para acceder al Dashboard.');
        }

        // Contar publicaciones y páginas solo si el rol es correcto
        $publicationCount = Publication::count();
        $pagesCount = Page::count();

        // Retornar la vista con las variables
        return view('vistas.dashboard', compact('publicationCount', 'pagesCount'));
    }
}
