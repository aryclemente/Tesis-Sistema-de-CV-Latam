<!-- <?php

// En ListController.php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\User;
// use App\Models\Publication;

// class ListController extends Controller
// {
//     public function showPosts(Request $request)
//     {
//         $publishers = User::whereHas('role', function ($query) {
//             $query->where('name', 'Publisher');
//         })->get();

//         $publisherId = $request->input('publisher_id');
//         $query = Publication::with('user')->whereHas('user.role', function ($query) {
//             $query->where('name', 'Publisher');
//         });

//         if ($publisherId) {
//             $query->where('users_idusers', $publisherId);
//         }

//         $publishedPosts = clone $query;
//         $draftPosts = clone $query;
//         $scheduledPosts = clone $query;

//         $posts = [
//             'Publicado' => $publishedPosts->where('estado', 'publicado')->paginate(5, ['*'], 'published_page'),
//             'Borrador' => $draftPosts->where('estado', 'borrador')->paginate(5, ['*'], 'draft_page'),
//             'Programado' => $scheduledPosts->where('estado', 'programado')->paginate(5, ['*'], 'scheduled_page'),
//         ];

//         // Cambiar la vista a 'vistas.list' en lugar de 'vistas.list-post'
//         return view('vistas.list-post', compact('publishers', 'posts'));
//     }
// } -->
