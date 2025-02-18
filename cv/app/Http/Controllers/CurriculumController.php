<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\Estado;
use App\Models\Mencion;
use App\Models\Direccion;
use App\Models\Estudio;
use App\Models\Certificacion;
use App\Models\ExperienciaLaboral;
use App\Models\Habilidad;
use App\Models\Idioma;
use Barryvdh\DomPDF\Facade as PDF;

class CurriculumController extends Controller
{
    public function generarCurriculum($user_id)
    {
        // Consulta con join para obtener los datos
        $direccion = Direccion::with(['estado', 'municipio', 'parroquia', 'ciudad'])
            ->where('user_id', $user_id)
            ->first();

        $estudios = Estudio::with(['nivelAcademico', 'mencion'])
            ->where('user_id', $user_id)
            ->get();

        $certificaciones = Certificacion::where('user_id', $user_id)
            ->get();

        $experienciaLaboral = ExperienciaLaboral::with(['habilidades'])
            ->where('user_id', $user_id)
            ->get();

        $idiomas = Idioma::whereHas('users', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();

        // Recopilar la información del usuario (si la necesitas también)
        $user = User::find($user_id);

        // Datos para el PDF
        $data = [
            'user' => $user,
            'direccion' => $direccion,
            'estudios' => $estudios,
            'certificaciones' => $certificaciones,
            'experienciaLaboral' => $experienciaLaboral,
            'idiomas' => $idiomas,
        ];

        // Generar el PDF
        $pdf = PDF::loadView('pdf.curriculum', $data);

        // Retornar el PDF como descarga
        return $pdf->download('curriculum_'.$user->first_name.'_'.$user->last_name.'.pdf');
    }
}
