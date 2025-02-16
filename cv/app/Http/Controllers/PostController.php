<?php


namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function index(Request $request)
    {

        if (Auth::user()->roles_idroles !== 1) {
            return redirect()->route('login')->with('error', 'No tienes permisos para ver las páginas.');
        }
        // Obtener todos los publicadores (usuarios con el rol Publisher)
        $publishers = User::whereHas('role', function ($query) {
            $query->where('name', 'Publisher');
        })->get();

        // Obtener el id del publicador desde la solicitud (si está presente)
        $publisherId = $request->input('publisher_id');

        // Construir la consulta de publicaciones
        $query = Publication::with('user')
            ->whereHas('user.role', function ($query) {
                $query->where('name', 'Publisher');
            });

        // Filtrar por publicador si se selecciona uno
        if ($publisherId) {
            $query->where('users_idusers', $publisherId);
        }

        // Filtrar por estado (Publicado, Borrador, Programado)
        $publishedPosts = clone $query;
        $draftPosts = clone $query;
        $scheduledPosts = clone $query;

        // Obtener publicaciones por estado
        $posts = [
            'Publicado' => $publishedPosts->where('estado', 'publicado')->paginate(5, ['*'], 'published_page'),
            'Borrador' => $draftPosts->where('estado', 'borrador')->paginate(5, ['*'], 'draft_page'),
            'Programado' => $scheduledPosts->where('estado', 'programado')->paginate(5, ['*'], 'scheduled_page'),
        ];

        // Retornar la vista con las publicaciones y publicadores
        return view('post.lista', compact('publishers', 'posts'));
    }
    // Método para mostrar los detalles de una publicación
    public function show($id)
    {
        // Obtener la publicación por su ID
        $publication = Publication::with('user')->findOrFail($id);

        // Retornar la vista de la publicación con los detalles
        return view('post.show', compact('publication'));
    }
     // Mostrar el formulario de edición
     public function edit($id)
     {
         // Obtener la publicación por ID
         $publication = Publication::findOrFail($id);

         // Retornar la vista de edición con la publicación
         return view('post.edit', compact('publication'));
     }

     // Actualizar la publicación
     public function update(Request $request, $id)
     {
         // Validar los datos del formulario
         $validated = $request->validate([
             'title' => 'required|string|max:255',
             'content' => 'required|string',
             'categoria' => 'required|string|max:255',
             'estado' => 'required|in:publicado,borrador,programado',
             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);

         // Obtener la publicación por ID
         $publication = Publication::findOrFail($id);

         // Actualizar los campos de la publicación
         $publication->title = $validated['title'];
         $publication->content = $validated['content'];
         $publication->categoria = $validated['categoria'];
         $publication->estado = $validated['estado'];

         // Si hay una imagen, subirla y actualizar el campo de la imagen
         if ($request->hasFile('image')) {
             $imagePath = $request->file('image')->store('public/images');
             $publication->image = basename($imagePath);
         }

         // Guardar los cambios
         $publication->save();

         // Redirigir de vuelta a la lista de publicaciones
         return redirect()->route('posts.lista')->with('success', 'Publicación actualizada correctamente');
     }
     public function destroy($id)
     {
         // Buscar la publicación por ID
         $publication = Publication::findOrFail($id);

         // Eliminar la publicación
         $publication->delete();

         // Redirigir a la lista de publicaciones con un mensaje de éxito
         return redirect()->route('posts.lista')->with('success', 'Publicación eliminada correctamente');
     }
}
