<?php

namespace App\Http\Controllers;

use App\Models\Idioma;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdiomaController extends Controller
{
    // Mostrar la vista con los idiomas disponibles
    public function showIdiomas()
    {
        // Obtener todos los idiomas con sus niveles
        $idiomas = Idioma::all();

        // Devolver la vista con los idiomas
        return view('cv.idiomas', compact('idiomas'));
    }

    // Almacenar los idiomas seleccionados por el usuario
    public function storeIdiomas(Request $request)
    {
        // Validar la entrada, asegurando que se envíen idiomas seleccionados
        $request->validate([
            'idiomas' => 'required|array', // Asegura que la entrada es un arreglo de idiomas
            'idiomas.*' => 'exists:idiomas,ididiomas', // Asegura que los IDs sean válidos
        ]);

        // Obtener el usuario autenticado
        $user = Auth::user(); // También se puede usar `auth()->user()` si lo prefieres.

        // Asociar los idiomas seleccionados al usuario
        $user->idiomas()->sync($request->idiomas); // Esto guarda los idiomas seleccionados en la tabla pivot

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('cv')->with('success', 'Idiomas registrados correctamente.');
    }
}
