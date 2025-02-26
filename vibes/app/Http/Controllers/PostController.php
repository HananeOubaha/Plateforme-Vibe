<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller {
    // Afficher tous les posts triés par date
    public function index() {
        $posts = Post::with('user')->orderBy('created_at', 'desc')->get();
        return view('posts.index', compact('posts'));
    }

    // Stocker un nouveau post
    public function store(Request $request) {
        $request->validate([
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        Post::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
            'image' => $imagePath
        ]);

        return redirect()->back()->with('success', 'Publication ajoutée avec succès');
    }

    // Modifier un post
    public function edit(Post $post) {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    // Mettre à jour un post
    public function update(Request $request, Post $post) {
        $this->authorize('update', $post);

        $request->validate([
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Mise à jour des données du post
        $post->content = $request->content;

        // Vérifie si une nouvelle image a été téléchargée
        if ($request->hasFile('image')) {
            // Supprime l'ancienne image si elle existe
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            // Stocke la nouvelle image
            $post->image = $request->file('image')->store('posts', 'public');
        }

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post mis à jour avec succès');
    }

    // Supprimer un post
    public function destroy(Post $post) {
        if ($post->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Action non autorisée');
        }

        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->back()->with('success', 'Publication supprimée');
    }

    // Afficher un post spécifique
    public function show(Post $post) {
        return view('posts.show', compact('post'));
    }
}
