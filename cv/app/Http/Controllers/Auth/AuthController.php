<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Nacionalidad;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\Role;
use App\Models\Ciudad;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;

use App\Models\Mencion;
use App\Models\NivelAcademico;
use App\Models\Idioma;
use App\Models\ExperienciaLaboral;
use App\Models\ExperienciaLaboralXHabilidad;
use App\Models\IdiomaXUsuario;
use App\Models\Estudio;
use App\Models\Certificacion;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;


class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function verify()
    {
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
        $cuidades = Ciudad::all();


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
            'cuidades',
            'menciones',
            'nivelesAcademicos',
            'idiomas'
        ));
    }
    // Método para obtener las ciudades según el estado
    public function getCiudades($estadoId)
    {
        // Obtenemos las ciudades relacionadas con el estado
        $ciudades = Ciudad::where('estados_idestados', $estadoId)->get();

        // Devolvemos las ciudades en formato JSON
        return response()->json($ciudades);
    }

    // Método para obtener los municipios según la ciudad
    public function getMunicipios($ciudadId)
    {
        // Obtenemos los municipios relacionados con la ciudad
        $municipios = Municipio::where('estados_idestados', $ciudadId)->get();

        // Devolvemos los municipios en formato JSON
        return response()->json($municipios);
    }

    // Método para obtener las parroquias según el municipio
    public function getParroquias($municipioId)
    {
        // Obtenemos las parroquias relacionadas con el municipio
        $parroquias = Parroquia::where('municipios_idmunicipios', $municipioId)->get();

        // Devolvemos las parroquias en formato JSON
        return response()->json($parroquias);
    }

    public function registerVerify(Request $request)
    {
        // Validación de los datos recibidos
        $request->validate([
            'first_name' => 'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
            'last_name' => 'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
            'cedula' => 'required|unique:users,cedula|regex:/^[0-9]{6,10}$/',
            'genero' => 'required',
            'user_name' => 'required|unique:users,user_name',
            'date_of_birth' => 'required|date|before:today|before_or_equal:today' . now()->subYears(18)->toDateString(),
            'nacionalidad' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'estado' => 'required|exists:estados,idestados',
            'municipio' => 'required|exists:municipios,idmunicipios',
            'parroquia' => 'required|exists:parroquias,idparroquias',
            'ciudad' => 'required|exists:cuidades,idcuidades',
            'experiencia_laboral' => 'required',
            'habilidades' => 'required',
            'habilidades.*' => 'exists:habilidades,idhabilidades',
            'estudios' => 'nullable|array',
            'estudios.*.estudio_logrado' => 'required|string',
            'estudios.*.niveles_academicos_idniveles_academicos' => 'required|exists:niveles_academicos,idniveles_academicos',
            'estudios.*.menciones_idmenciones' => 'required|exists:menciones,idmenciones',
            'idiomas' => 'nullable|array',
            'idiomas.*.idioma_id' => 'required|exists:idiomas,ididiomas',
            'idiomas.*.nivel_idioma' => 'required|string',
            'idiomas' => 'array', // Aseguramos que se reciban como array
            'idiomas.*' => 'exists:idiomas,ididiomas', // Verificamos que los idiomas sean válidos
        ]);

        DB::beginTransaction(); // Iniciar transacción para garantizar que todo se guarde correctamente

        try {
            // Crear el usuario
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'date_of_birth' => $request->date_of_birth,
                'cedula' => $request->cedula,
                'genero' => $request->genero,
                'user_name' => $request->user_name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'nacionalidad_idnacionalidad' => $request->nacionalidad,
                'roles_idroles' => 2,
            ]);

            // Mostrar el "token" o ID del usuario guardado
            $userToken = $user->idusers; // Puedes usar el ID del usuario como "token"

            // Asociar estado, municipio, parroquia y ciudad al usuario
            $user->estado()->associate($request->estado);
            $user->municipio()->associate($request->municipio);
            $user->parroquia()->associate($request->parroquia);
            $user->ciudad()->associate($request->ciudad);
            $user->save();

            // Guardar las respuestas de seguridad
            $preguntas = [
                $request->pregunta_1 => $request->respuesta_1,
                $request->pregunta_2 => $request->respuesta_2,
                $request->pregunta_3 => $request->respuesta_3,
                $request->pregunta_4 => $request->respuesta_4
            ];

            foreach ($preguntas as $pregunta_id => $respuesta) {
                Respuesta::create([
                    'users_idusers' => $user->idusers,
                    'preguntas_idpreguntas' => $pregunta_id,
                    'respuesta' => bcrypt($respuesta),
                ]);
            }

            // Guardar la experiencia laboral
            if ($request->has('experiencia_laboral')) {
                foreach ($request->experiencia_laboral as $experiencia) {
                    // Crear la experiencia laboral
                    $experiencia_laboral = ExperienciaLaboral::create([
                        'empresa' => $experiencia['empresa'],
                        'cargo' => $experiencia['cargo'],
                        'fecha_inicio' => $experiencia['fecha_inicio'],
                        'fecha_fin' => $experiencia['fecha_fin'],
                        'user_id' => $user->idusers,  // Asocia el usuario a la experiencia laboral
                    ]);

                    // Relacionar las habilidades con la experiencia laboral
                    if (isset($experiencia['habilidades'])) {
                        foreach ($experiencia['habilidades'] as $habilidad_id) {
                            ExperienciaLaboralXHabilidad::create([
                                'experiencia_laboral_id' => $experiencia_laboral->idexperiencias_laraborales,
                                'habilidad_id' => $habilidad_id,
                            ]);
                        }
                    }
                }
            }

            // Guardar los estudios
            if ($request->has('estudios_logrados')) {
                Estudio::create([
                    'estudio_logrado' => $request->estudios_logrados,
                    'user_id' => $user->idusers,
                    'niveles_academicos_idniveles_academicos' => $request->niveles_academicos_idniveles_academicos,
                    'menciones_idmenciones' => $request->menciones_idmenciones,
                ]);
            }

            // Guardar los idiomas seleccionados
            if ($request->has('idiomas')) {
                foreach ($request->idiomas as $idiomaId) {
                    IdiomaXUsuario::create([
                        'idioma_id' => $idiomaId,
                        'user_id' => $user->idusers,
                    ]);
                }
            }

            // Guardar certificaciones
            if ($request->has('certificaciones')) {
                foreach ($request->certificaciones as $certificacion) {
                    Certificacion::create([
                        'institucion' => $certificacion['institucion'],
                        'nombre_institucion' => $certificacion['nombre_institucion'],
                        'fecha_expedicion' => $certificacion['fecha_expedicion'],
                        'user_id' => $user->idusers,
                    ]);
                }
            }

            // Confirmar la transacción si todo se guardó correctamente
            DB::commit();

            // Mostrar el token generado (ID del usuario en este caso)
            return redirect()->route('login')->with('success', 'Usuario registrado exitosamente. Token generado: ' . $userToken);

        } catch (\Exception $e) {
            // En caso de error, deshacer la transacción
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Ocurrió un error al registrar el usuario. Intenta de nuevo.']);
        }
    }






public function loginVerify(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:8'
    ], [
        'email.required' => 'El email es requerido.',
        'email.email' => 'El email debe ser una dirección de correo válida.',
        'password.required' => 'La contraseña es requerida.',
        'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
    ]);

    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        $user = Auth::user();

        // Establecer una sesión para mostrar el mensaje de bienvenida
        session(['show_message' => "Bienvenido, {$user->first_name} {$user->last_name}!"]);

        if ($user->roles_idroles === 2) {
            return redirect()->route('publications')->with('success', "Bienvenido, {$user->first_name} {$user->last_name}. Accediste como Publicador.");
        }

        return redirect()->route('dashboard')->with('success', "Bienvenido, {$user->first_name} {$user->last_name}! Accediste como Administrador.");
    }

    return back()->withErrors(['invalid_credentials' => 'Usuario y/o contraseña incorrecto'])->withInput();
}



    public function verifyEmail(Request $request)
    {
        // Validar el correo electrónico
        $request->validate([
            'email' => 'required|email|exists:users,email',  // validaciones para el email
        ], [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección de correo válida.',
            'email.exists' => 'El correo electrónico no está registrado en nuestros registros.',
        ]);
        $email = $request->email;

        // Buscar el usuario por su correo electrónico
        $thisuser = User::where('email', $email)->first();
        $user = $thisuser->idusers;
        if (!$thisuser) {
            return redirect()->route('verify')->withErrors('Usuario no encontrado');
        }


        session(['email' => $thisuser->email]);
        return redirect()->route('questions', ['id' => $user])->with('success', 'Usuario registrado exitosamente.');
    }

    public function questions()
    {
        // Obtener el correo desde la sesión
        $email = session('email');

        if (!$email) {
            return back()->withErrors(['email' => 'No se ha encontrado un correo válido en la sesión.']);
        }

        // Buscar el usuario por correo
        $user = User::where('email', $email)->first();
        // Obtener las preguntas respondidas por este usuario
        $preguntas = $user->preguntas()->get();

        // Retorna los resultados a la vista
        return view('auth.Questions', compact('preguntas'));
    }

    public function verifyQuestions(Request $request)
{
    // Validar las respuestas enviadas por el formulario
    $request->validate([
        'respuesta_1' => 'required',
        'respuesta_2' => 'required',
        'respuesta_3' => 'required',
        'respuesta_4' => 'required',
    ]);

    // Obtener el usuario autenticado
    $userId = auth()->id();

    // Validar las preguntas y respuestas proporcionadas
    $preguntasYRespuestas = [
        ['pregunta' => $request->pregunta_1, 'respuesta' => $request->respuesta_1],
        ['pregunta' => $request->pregunta_2, 'respuesta' => $request->respuesta_2],
        ['pregunta' => $request->pregunta_3, 'respuesta' => $request->respuesta_3],
        ['pregunta' => $request->pregunta_4, 'respuesta' => $request->respuesta_4],
    ];

    foreach ($preguntasYRespuestas as $index => $item) {
        $preguntaId = $item['pregunta'];
        $respuesta = $item['respuesta'];

        // Verificar si la pregunta y respuesta coinciden en la base de datos
        $respuestaCorrecta = DB::table('respuestas')
            ->where('user_id', $userId)
            ->where('pregunta_id', $preguntaId)
            ->where('respuesta', $respuesta)
            ->exists();

        if (!$respuestaCorrecta) {
            return back()->withErrors([
                'invalid_questions' => "La respuesta a la pregunta '{$preguntaId}' es incorrecta.",
            ]);
        }
    }

    // Si todas las respuestas son correctas, redirigir al token
    return redirect()->route('token')->with('success', 'Usuario registrado exitosamente.');
}


    public function Token()
    {
        // Obtener el correo desde la sesión
        $email = session('email');

        if (!$email) {
            return back()->withErrors(['email' => 'No se ha encontrado un correo válido en la sesión.']);
        }

        // Buscar el usuario por correo
        $user = User::where('email', $email)->first();

        // Generar un código único de 6 caracteres
        $codigo = Str::random(6);
        //dump($email, $codigo, $user);
        // Enviar el código al correo del usuario
        Mail::to($user->email)->send(new \App\Mail\RecoveryCodeMail($codigo));

        /* try {
            Mail::to($user->email)->send(new \App\Mail\RecoveryCodeMail($codigo));
        } catch (\Exception $e) {
            // Maneja el error (puedes registrar el error o mostrar un mensaje)
            dd('Error al enviar el correo: ' . $e->getMessage());
        } */

        // Redirigir al formulario donde el usuario debe ingresar el código

        return view('auth.Token')->with($codigo);
    }

    public function verifyToken(Request $request)
    {
        // Obtiene el token de la solicitud
        $codigouser = $request->codigo;
        $codigosend = $request->codigosend;


        // Valida si el token ingresado coincide con el guardado
        if ($codigouser === $codigosend) {
            return response()->json(['mensaje' => 'Token válido'], 200);
        } else {
            return response()->json(['mensaje' => 'Token inválido'], 401);
        }


        return view('NewPass');
    }

    public function NewPass(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);

        // Obtener el correo desde la sesión
        $email = session('email');

        if (!$email) {
            return back()->withErrors(['email' => 'No se ha encontrado un correo válido en la sesión.']);
        }

        // Buscar el usuario por correo
        $user = User::where('email', $email)->first();

        // Actualizar la contraseña
        $user->password = Hash::make($request->password_confirmation);
        $user->save();


        return redirect()->route('dashboard');
    }

    public function signOut(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'session cerrada correctamente');
    }

    public function updateProfilePicture(Request $request)
{
    // Validación
    $request->validate([
        'user_name' => [
            'nullable',
            'string',
            'max:255',
            Rule::unique('users', 'user_name')->ignore(Auth::user()->idusers, 'idusers'),
        ],
        'address' => 'nullable|string|max:255',
        'email' => [
            'nullable',
            'email',
            'max:255',
            Rule::unique('users', 'email')->ignore(Auth::user()->idusers, 'idusers'),
        ],
    ], [
        'user_name.unique' => 'El nombre de usuario ya está en uso.',
        'email.unique' => 'El correo electrónico ya está en uso.',
        'email.email' => 'El correo electrónico debe ser una dirección válida.',
    ]);

    // Actualiza el perfil del usuario
    $user = Auth::user();
    $user->user_name = $request->user_name;
    $user->address = $request->address;
    $user->email = $request->email;
    $user->save();

    // Establecer el mensaje de éxito en la sesión
    session()->flash('show_message', 'Perfil actualizado correctamente.');

    // Redirigir según el rol del usuario
    if ($user->roles_idroles === 2) { // Si el usuario es un Publicador (roles_idroles = 2)
        return redirect()->route('publications')->with('success', "Actualizaste tu perfil, {$user->first_name} {$user->last_name}");
    }

    // Si no es Publicador, es Administrador (asumimos roles_idroles = 1 para Admin)
    return redirect()->route('dashboard')->with('success', "Actualizaste tu perfil, {$user->first_name} {$user->last_name}");
}

public function destroy()
{
    $user = Auth::user();

    // Verificar si el usuario tiene el rol de administrador y es el único administrador
    if ($user->roles_idroles == 1) { // Verificar si es administrador
        $adminCount = User::where('roles_idroles', 1)->count(); // Contar administradores

        if ($adminCount <= 1) {
            return redirect()->back()->with('error', 'No puedes eliminar tu cuenta porque eres el único administrador.');
        }
    }

    // Si pasa la verificación, proceder con la eliminación de la cuenta
    $user->delete();
    Auth::logout();

    return redirect()->route('login')->with('success', 'Tu cuenta ha sido eliminada correctamente.');
}


}
