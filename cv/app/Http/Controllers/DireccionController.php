<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Direccion;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\Ciudad;

class DireccionController extends Controller
{
    public function create()
    {
        $estados = Estado::all();
        return view('cv.direccion', compact('estados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'estado_id' => 'required',
            'municipio_id' => 'required',
            'parroquia_id' => 'required',
            'ciudad_id' => 'required',
            'direccion_detallada' => 'required|string',
        ]);

        Direccion::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'estado_id' => $request->estado_id,
                'municipio_id' => $request->municipio_id,
                'parroquia_id' => $request->parroquia_id,
                'ciudad_id' => $request->ciudad_id,
                'direccion_detallada' => $request->direccion_detallada,
            ]
        );

        return redirect()->back()->with('success', 'Dirección guardada correctamente.');
    }

    public function getMunicipios($estado_id)
    {
        return response()->json(Municipio::where('estado_id', $estado_id)->get());
    }

    public function getParroquias($municipio_id)
    {
        return response()->json(Parroquia::where('municipio_id', $municipio_id)->get());
    }

    public function getCiudades($estado_id)
    {
        return response()->json(Ciudad::where('estado_id', $estado_id)->get());
    }
}
