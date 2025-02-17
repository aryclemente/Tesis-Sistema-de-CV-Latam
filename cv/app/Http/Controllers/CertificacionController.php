<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificacion;
use Illuminate\Support\Facades\Auth;

class CertificacionController extends Controller
{
    public function create()
    {
        // Cargar vista para agregar certificación
        return view('cv.certificaciones');
    }

    public function store(Request $request)
    {
        // Validación de los campos
        $request->validate([
            'institucion' => 'required|string|max:255',
            'nombre_certificado' => 'required|string|max:255',
            'fecha_expedicion' => 'required|date',
        ]);

        // Crear la certificación
        Certificacion::create([
            'institucion' => $request->institucion,
            'nombre_certificado' => $request->nombre_certificado,
            'fecha_expedicion' => $request->fecha_expedicion,
            'user_id' => Auth::id(), // Asignar el id del usuario autenticado
        ]);

        // Redirigir a una página con mensaje de éxito
        return redirect()->route('cv')->with('success', 'Certificación registrada correctamente.');
    }
}

