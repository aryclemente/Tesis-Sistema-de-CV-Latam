<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudio;
use App\Models\NivelAcademico;
use App\Models\Mencion;
use Illuminate\Support\Facades\Auth;

class EstudioController extends Controller
{
    // Mostrar el formulario con los datos necesarios
    public function create()
    {
        $nivelesAcademicos = NivelAcademico::all();
        $menciones = Mencion::all();

        return view('cv.estudios', compact('nivelesAcademicos', 'menciones'));
    }

    // Guardar los datos del formulario en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'estudios_logrados' => 'required|string|max:255',
            'nivel_academico_id' => 'required|exists:niveles_academicos,idniveles_academicos',
            'mencion_id' => 'required|exists:menciones,idmenciones',
        ]);

        Estudio::create([
            'user_id' => Auth::id(), // Obtener el ID del usuario autenticado
            'estudios_logrados' => $request->estudios_logrados,
            'nivel_academico_id' => $request->nivel_academico_id,
            'mencion_id' => $request->mencion_id,
        ]);

        return redirect()->route('cv')->with('success', 'Estudio registrado correctamente.');
    }
}
