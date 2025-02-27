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
    <div class="py-12 bg-gray-50">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <!-- Section du profil -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="bg-gradient-to-r from-indigo-500 to-purple-600 h-32"></div>

                <div class="p-6 text-gray-900">
                    <div class="flex flex-col items-center -mt-16">
                        <img class="w-32 h-32 rounded-full border-4 border-white shadow-md"
                             src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('default-avatar.png') }}"
                             alt="Photo de {{ $user->pseudo }}">

                        <h3 class="mt-4 text-2xl font-semibold text-gray-900">
                            {{ $user->pseudo ?? $user->name }}
                        </h3>
                        <p class="text-gray-600">{{ $user->email }}</p>

                        <p class="mt-2 text-gray-700 text-center max-w-lg">
                            {{ $user->bio ? $user->bio : "Aucune bio disponible." }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Section des publications -->
            <div class="mt-8">
                <h2 class="text-xl font-semibold mb-4 text-purple-800">Publications de {{ $user->pseudo }}</h2>
                @if ($posts->isEmpty())
                    <p class="text-gray-600">Aucune publication.</p>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($posts as $post)
                            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-transform">
                                <!-- Image de la publication -->
                                @if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" 
                                         alt="Image de la publication" 
                                         class="w-full h-48 object-cover">
                                @endif

                                <!-- Contenu de la publication -->
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold text-gray-900">{{ $post->title }}</h3>
                                    <p class="text-gray-700 mt-2">{{ $post->content }}</p>
                                    <span class="text-sm text-gray-500 mt-2 block">
                                        {{ $post->created_at->format('d/m/Y à H:i') }}
                                    </span>

                                    <!-- Likes -->
                                    <div class="mt-2 flex items-center space-x-2">
                                        <i class="fas fa-heart text-red-500"></i>
                                        <span class="text-sm text-gray-500">{{ $post->likes->count() }} Likes</span>
                                    </div>

                                    <!-- Bouton pour afficher/masquer les commentaires -->
                                    <button class="toggle-comments-btn text-purple-600 text-sm mt-2">
                                        <i class="fas fa-comment"></i> Voir les commentaires
                                    </button>

                                    <!-- Section des commentaires (cachée par défaut) -->
                                    <div class="hidden mt-4 border-t pt-2">
                                        <h4 class="font-semibold text-sm text-gray-900">Commentaires :</h4>
                                        @forelse ($post->comments as $comment)
                                            <p class="text-gray-600 text-sm mt-2">
                                                <strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}
                                            </p>
                                        @empty
                                            <p class="text-gray-600 text-sm">Aucun commentaire pour cette publication.</p>
                                        @endforelse

                                        <!-- Formulaire pour ajouter un commentaire -->
                                        <form method="POST" action="{{ route('comment.store', $post->id) }}" class="mt-4">
                                            @csrf
                                            <textarea name="content" placeholder="Laissez un commentaire" 
                                                      class="border border-purple-300 p-2 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"></textarea>
                                            <button type="submit" 
                                                    class="bg-purple-600 text-white px-4 py-2 rounded-lg mt-2 hover:bg-purple-700 transition">
                                                <i class="fas fa-paper-plane"></i> Commenter
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

    <!-- JavaScript pour le toggle des commentaires -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Sélectionner tous les boutons "Afficher les commentaires"
            document.querySelectorAll(".toggle-comments-btn").forEach(button => {
                button.addEventListener("click", function () {
                    const commentsSection = this.nextElementSibling; // Section des commentaires
                    commentsSection.classList.toggle("hidden"); // Basculer l'affichage
                    this.innerHTML = commentsSection.classList.contains("hidden") 
                        ? '<i class="fas fa-comment"></i> Voir les commentaires' 
                        : '<i class="fas fa-comment-slash"></i> Masquer les commentaires';
                });
            });
        });
    </script>
</x-app-layout>
</html>