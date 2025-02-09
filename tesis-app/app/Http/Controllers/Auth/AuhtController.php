<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nacionalidad;
use App\Models\Pregunta;

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

    public function showForm(){

        $nacionalidades = Nacionalidad::all();
        $preguntas = Pregunta::all();

        return view('auth.register', compact('nacionalidades', 'preguntas'));
    }

    public function store(Request $request){


    }
}
