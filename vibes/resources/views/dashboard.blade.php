<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Social Network</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script>
        function toggleComments(postId) {
            let commentsDiv = document.getElementById('comments-' + postId);
            commentsDiv.classList.toggle('hidden');
        }
    </script>
</head>
@php
    $user = auth()->user();
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <!-- Profil Section -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-8">
                <div class="bg-gradient-to-r from-indigo-500 to-purple-600 h-32"></div>

                <div class="p-6 text-gray-900">
                    <div class="flex flex-col items-center -mt-16">
                        <img class="w-32 h-32 rounded-full border-4 border-white shadow-md"
                             src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('images/default-avatar.png') }}"
                             alt="Photo de profil">
                        <h3 class="mt-4 text-2xl font-semibold text-gray-900">
                            {{ $user->pseudo ?? $user->name }}
                        </h3>
                        <p class="text-gray-600">{{ $user->email }}</p>
                        <p class="mt-2 text-gray-700 text-center max-w-lg">
                            {{ $user->bio ? $user->bio : "Aucune bio disponible." }}
                        </p>

                        <div class="mt-4 flex space-x-4">
                            <a href="{{ route('profile.edit') }}"
                               class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition">
                                Modifier le profil
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="px-4 py-2 bg-red-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 transition">
                                    Déconnexion
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Publications Section -->
            <div class="mt-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Mes publications</h3>

                @if ($posts->isEmpty())
                    <p class="text-gray-500">Aucune publication disponible.</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($posts as $post)
                            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-48 object-cover">
                                @endif
                                <div class="p-4">
                                    <p class="text-gray-700">{{ $post->content }}</p>
                                    <p class="text-gray-500 text-sm mt-2">Publié le {{ $post->created_at->format('d M Y') }}</p>

                                    <!-- Like Button -->
                                    <div class="mt-4 flex items-center space-x-4">
                                        <form method="POST" action="{{ route('like.store', $post->id) }}">
                                            @csrf
                                            <button type="submit" class="text-indigo-600 hover:text-indigo-800">
                                                <i class="fas fa-thumbs-up"></i> {{ $post->likes->count() }}
                                            </button>
                                        </form>
                                        <button onclick="toggleComments({{ $post->id }})" class="text-purple-600 hover:text-purple-800">
                                            <i class="fas fa-comment"></i> Commenter
                                        </button>
                                    </div>

                                    <!-- Comments Section -->
                                    <div id="comments-{{ $post->id }}" class="hidden mt-4">
                                        <h4 class="text-lg font-semibold text-gray-900">Commentaires</h4>
                                        @foreach ($post->comments as $comment)
                                            <div class="bg-gray-50 p-2 rounded-lg mb-2">
                                                <p><strong>{{ $comment->user->pseudo }}:</strong> {{ $comment->content }}</p>
                                            </div>
                                        @endforeach
                                        <form method="POST" action="{{ route('comment.store', $post->id) }}">
                                            @csrf
                                            <textarea name="content" placeholder="Laissez un commentaire" class="border p-2 w-full rounded mt-2"></textarea>
                                            <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded mt-2 hover:bg-purple-700 transition">
                                                Commenter
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>