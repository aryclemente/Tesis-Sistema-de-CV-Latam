<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->roles_idroles !== 1) {
            return redirect()->route('login')->with('error', 'No tienes permisos para ver las páginas.');
        }

        $status = $request->query('status', 'all');
        $query = Page::query();
        if ($status !== 'all') {
            $query->where('status', $status);
        }

        $pages = $query->paginate(5);
        return view('pages.index', compact('pages', 'status'));
    }

    public function create()
    {
        if (Auth::user()->roles_idroles !== 1) {
            return redirect()->route('login')->with('error', 'No tienes permisos para crear páginas.');
        }

        return view('pages.create');
    }

    public function store(Request $request)
    {
        if (Auth::user()->roles_idroles !== 1) {
            return redirect()->route('login')->with('error', 'No tienes permisos para registrar una página.');
        }

        $request->validate([
            'title' => 'required|string',
            'content' => 'required',
            'description' => 'required',
            'status' => 'required|in:draft,published,archived',
        ]);

        $slug = Str::slug($request->input('title'));
        $originalSlug = $slug;
        $counter = 1;
        while (Page::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $userId = Auth::id();

        Page::create([
            'title' => $request->input('title'),
            'slug' => $slug,
            'content' => $request->input('content'),
            'status' => $request->input('status'),
            'description' => $request->input('description'),
            'users_idusers' => $userId,
        ]);

        return redirect()->route('pages.index')->with('success', 'Página creada correctamente.');
    }

    // El resto de las acciones 'edit', 'update', 'destroy' seguirían el mismo patrón.
}
