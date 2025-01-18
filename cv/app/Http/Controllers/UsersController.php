<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Nacionalidad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        if (Auth::user()->roles_idroles !== 1) {
            return redirect()->route('login')->with('error', 'No tienes permisos para ver los usuarios.');
        }

        $users = User::with('pages')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        if (Auth::user()->roles_idroles !== 1) {
            return redirect()->route('login')->with('error', 'No tienes permisos para crear usuarios.');
        }

        $nacionalidades = Nacionalidad::all();
        $roles = Role::all();

        return view('users.create', compact('nacionalidades', 'roles'));
    }

    public function store(Request $request)
    {
        if (Auth::user()->roles_idroles !== 1) {
            return redirect()->route('login')->with('error', 'No tienes permisos para registrar un usuario.');
        }

        $request->validate([
            'first_name' => 'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
            'last_name' => 'required|string|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
            'cedula' => 'required|unique:users,cedula|regex:/^[0-9]{6,10}$/',
            'user_name' => 'required|unique:users,user_name',
            'date_of_birth' => 'required|date|before:today|before_or_equal:today',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'nacionalidad_idnacionalidad' => 'required|integer',
            'roles_idroles' => 'required|integer',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'date_of_birth' => $request->date_of_birth,
            'cedula' => $request->cedula,
            'user_name' => $request->user_name,
            'address' => $request->address,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'x' => $request->x,
            'tiktok' => $request->tiktok,
            'descripcion' => $request->descripcion,
            'password' => bcrypt($request->password),
            'nacionalidad_idnacionalidad' => $request->nacionalidad_idnacionalidad,
            'roles_idroles' => $request->roles_idroles,
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');
    }

    // Resto de las funciones 'show', 'edit', 'update', 'destroy' seguirían el mismo patrón.
}
