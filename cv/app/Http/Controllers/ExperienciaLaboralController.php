<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExperienciaLaboral;
use App\Models\Habilidad;

class ExperienciaLaboralController extends Controller
{
    public function create()
    {
        return view('cv.experiencia_laboral');
    }

    public function store(Request $request)
{
    $request->validate([
        'empresa' => 'required|string|max:255',
        'cargo' => 'required|string|max:255',
        'fecha_inicio' => 'required|date|before_or_equal:fecha_fin', 
        'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        'habilidades' => 'required|string',
    ], [
        'fecha_inicio.before_or_equal' => 'La fecha de inicio no puede ser posterior a la fecha de fin.',
        'fecha_fin.after_or_equal' => 'La fecha de fin no puede ser anterior a la fecha de inicio.',
    ]);

    // Crear la experiencia laboral
    $experiencia = ExperienciaLaboral::create([
        'empresa' => $request->empresa,
        'cargo' => $request->cargo,
        'fecha_inicio' => $request->fecha_inicio,
        'fecha_fin' => $request->fecha_fin,
    ]);

    // Procesar habilidades ingresadas por el usuario
    $habilidadesIngresadas = explode(',', $request->habilidades);
    $habilidadesIds = [];

    foreach ($habilidadesIngresadas as $habilidad) {
        $habilidadNombre = trim($habilidad);
        if (!empty($habilidadNombre)) {
            $habilidadModel = Habilidad::firstOrCreate(['nombre_habilidad' => $habilidadNombre]);
            $habilidadesIds[] = $habilidadModel->id;
        }
    }

    // Asociar habilidades a la experiencia laboral
    $experiencia->habilidades()->sync($habilidadesIds);

    return redirect()->back()->with('success', 'Experiencia laboral registrada correctamente.');
}

}
