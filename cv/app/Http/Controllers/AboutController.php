<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\Comment;

class AboutController extends Controller
{
    public function index()
    {

        $publications = Publication::where('categoria', 'Sobre Nosotros')
            ->where('estado', 'publicado')
            ->inRandomOrder()
            ->take(4)
            ->get();

        $comments = Comment::with('user')
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('cms.SobreNosostros', compact('publications', 'comments'));
    }
}

