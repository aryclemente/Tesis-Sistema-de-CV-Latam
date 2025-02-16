<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // Mostrar el formulario de contacto
    public function showForm()
    {
        return view('cms.Contactanos');
    }

    public function store(Request $request)
    {
        // Verifica qué datos se están recibiendo
       //dd($request->all()); // Esto imprimirá todos los datos del formulario enviados

        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255',  // Validar correctamente el correo
            'mensaje' => 'required|string',
        ]);

        // Preparar los datos para insertar en la tabla de comentarios
        $commentData = [
            'full_name' => $validatedData['nombre'],
            'correo' => $validatedData['correo'],  // Guardar el correo correctamente
            'coment' => $validatedData['mensaje'],
        ];


        // Crear el comentario en la base de datos
        Comment::create($commentData);

        // Redirigir con mensaje de éxito
        return redirect()->route('Contactanos')->with('success', 'Comentario enviado exitosamente.');
    }




}
