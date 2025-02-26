<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Social Network</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome pour les icônes -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<x-app-layout>
    <div class="max-w-2xl mx-auto p-4">
        <h1 class="text-xl font-bold mb-4">Publications</h1>

        <!-- Formulaire d'ajout de post -->
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
            @csrf
            <textarea name="content" class="w-full p-2 border rounded" placeholder="Exprimez-vous..."></textarea>
            <input type="file" name="image" class="mt-2">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Publier</button>
        </form>

        <!-- Liste des posts -->
        @foreach($posts as $post)
            <div class="bg-white p-4 rounded shadow mb-4">
                <div class="flex items-center mb-2">
                    <img src="{{ $post->user->profile_photo ? asset('storage/' . $post->user->profile_photo) : asset('default-avatar.png') }}"
                         alt="Avatar" class="w-8 h-8 rounded-full">
                    <span class="ml-2 font-bold">{{ $post->user->pseudo }}</span>
                    <span class="ml-2 text-gray-500 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                </div>

                @if($post->content)
                    <p>{{ $post->content }}</p>
                @endif

                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="w-full mt-2 rounded">
                @endif

                @if(Auth::id() === $post->user_id)
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Supprimer</button>
                    </form>
                @endif
                @if (Auth::user()->id === $post->user_id)
    <a href="{{ route('posts.edit', $post) }}"
       class="bg-yellow-500 text-white px-3 py-1 rounded text-sm">
       Edit
    </a>
@endif

            </div>
        @endforeach
    </div>
</x-app-layout>
