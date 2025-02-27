<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store($postId)
    {
        $post = Post::findOrFail($postId);

        // Vérifie si l'utilisateur a déjà liké cette publication
        if (!$post->likes()->where('user_id', auth()->id())->exists()) {
            $post->likes()->create(['user_id' => auth()->id()]);
        }

        return back(); // Retourne à la même page après l'ajout du like
    }

    public function destroy($postId)
    {
        $post = Post::findOrFail($postId);

        // Supprime le like de l'utilisateur si il existe
        $post->likes()->where('user_id', auth()->id())->delete();

        return back(); // Retourne à la même page après la suppression du like
    }
}
