<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        // Validation du contenu du commentaire
        $request->validate([
            'content' => 'required|max:500',
        ]);

        // Récupérer la publication
        $post = Post::findOrFail($postId);

        // Créer un nouveau commentaire associé à la publication
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = auth()->id();  // L'utilisateur actuellement connecté
        $comment->post_id = $post->id;
        $comment->save();

        // Redirection ou retour avec succès
        return redirect()->route('users.show', $post->user_id)->with('success', 'Commentaire ajouté !');
    }
}
