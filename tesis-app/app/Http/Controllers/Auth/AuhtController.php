<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nacionalidad;
use App\Models\Pregunta;
use App\Models\User;
use App\Models\Ciudad;
use App\Models\Rol;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\Mencion;
use App\Models\NivelAcademico;
use App\Models\Idioma;

class AuhtController extends Controller
{
    public function login(){

        return view('auth.login');
    }

    public function register(){

        return view('auth.register');
    }

    public function verify(){

        return view('auth.verify');
    }

    public function showForm()
    {
        // Obtener las nacionalidades y las preguntas
        $nacionalidades = Nacionalidad::all();
        $preguntas = Pregunta::all();

        // Obtener los estados, municipios, parroquias y ciudades
        $estados = Estado::all();
        $municipios = Municipio::all();
        $parroquias = Parroquia::all();
        $ciudades = Ciudad::all();

        // Obtener las menciones y niveles académicos
        $menciones = Mencion::all();
        $nivelesAcademicos = NivelAcademico::all();

         // Obtener los idiomas con sus niveles
        $idiomas = Idioma::all();

        // Pasar todas estas variables a la vista
        return view('auth.register', compact(
            'nacionalidades',
            'preguntas',
            'estados',
            'municipios',
            'parroquias',
            'ciudades',
            'menciones',
            'nivelesAcademicos',
            'idiomas'
        ));
    }


public function getCiudades($estado_id)
    {
        $ciudades = Ciudad::where('estado_id', $estado_id)->get();
        return response()->json($ciudades);
    }

    // Método para obtener los municipios basados en el estado
    public function getMunicipios($estado_id)
    {
        $municipios = Municipio::where('estado_id', $estado_id)->get();
        return response()->json($municipios);
    }

    // Método para obtener las parroquias basadas en el municipio
    public function getParroquias($municipio_id)
    {
        $parroquias = Parroquia::where('municipio_id', $municipio_id)->get();
        return response()->json($parroquias);
    }








    public function store(Request $request){


    }
}
