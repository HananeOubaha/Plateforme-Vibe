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
<div class="max-w-4xl mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Edit Post</h2>

    @if (session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label for="content" class="block font-medium text-gray-700">Content</label>
        <textarea name="content" id="content" rows="5"
                  class="w-full p-2 border rounded-md">{{ $post->content }}</textarea>
        @error('content')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="image" class="block font-medium text-gray-700">Image</label>
        
        <!-- Affichage de l'image actuelle -->
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="w-32 h-32 object-cover rounded">
        @endif
        
        <input type="file" name="image" id="image" class="w-full p-2 border rounded-md mt-2">
        @error('image')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
        Update Post
    </button>
</form>
</div>
</x-app-layout>

