<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Récupérer la recherche (pseudo ou email)
        $search = $request->input('search');

        // Filtrer les utilisateurs selon la recherche
        $users = User::query()
            ->when($search, function ($query, $search) {
                $query->where('pseudo', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%");
            })
            ->with(['posts.likes', 'posts.comments']) // Charger les posts avec likes et commentaires
            ->paginate(10); // Paginer les résultats (10 par page)

        return view('users.index', compact('users', 'search'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        // Récupérer les posts de l'utilisateur avec leurs likes et commentaires
        $posts = Post::where('user_id', $user->id)
            ->with(['likes', 'comments']) // Charger les likes et commentaires pour chaque post
            ->orderBy('created_at', 'desc')
            ->get();

        return view('users.show', compact('user', 'posts'));
    }
}
