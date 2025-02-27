<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Social Network</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<x-app-layout>
    <div class="py-12 bg-gray-50">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold mb-6 text-purple-800">Publications</h1>

            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="mb-6 bg-white p-6 rounded-lg shadow-lg">
                @csrf
                <textarea name="content" class="w-full p-3 border border-purple-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Exprimez-vous..."></textarea>
                <input type="file" name="image" class="mt-3">
                <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded-lg mt-3 hover:bg-purple-700 transition">
                    <i class="fas fa-paper-plane"></i> Publier
                </button>
            </form>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($posts as $post)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-transform">
                        <div class="p-4 border-b border-gray-200">
                            <div class="flex items-center space-x-3">
                                <img src="{{ $post->user->profile_photo ? asset('storage/' . $post->user->profile_photo) : asset('default-avatar.png') }}" alt="Avatar" class="w-10 h-10 rounded-full border-2 border-purple-500 object-cover">
                                <div>
                                    <span class="font-bold text-gray-800">{{ $post->user->pseudo }}</span>
                                    <span class="text-sm text-gray-500 block">{{ $post->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="p-4">
                            @if($post->content)
                                <p class="text-gray-700">{{ $post->content }}</p>
                            @endif
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-64 object-cover rounded-lg mt-3">
                            @endif
                        </div>
                        <div class="p-4 border-t border-gray-200">
                            <form method="POST" action="{{ route('posts.like', $post) }}" class="inline-block">
                                @csrf
                                <button type="submit" class="text-purple-600 hover:text-purple-800 transition">
                                    <i class="fas fa-thumbs-up"></i> J'aime ({{ $post->likes->count() }})
                                </button>
                            </form>
                            <button class="toggle-comments-btn text-purple-600 hover:text-purple-800 ml-4 transition" data-post-id="{{ $post->id }}">
                                <i class="fas fa-comment"></i> Commentaires ({{ $post->comments->count() }})
                            </button>
                        </div>
                        <div class="comments-section hidden p-4 border-t border-gray-200" id="comments-{{ $post->id }}">
                            @foreach ($post->comments as $comment)
                                <div class="mt-2">
                                    <p class="text-sm text-gray-700">
                                        <strong>{{ $comment->user->name }}</strong>: {{ $comment->content }}
                                    </p>
                                </div>
                            @endforeach
                            <form method="POST" action="{{ route('posts.comment', $post) }}" class="mt-4">
                                @csrf
                                <input type="text" name="content" class="w-full p-2 border border-purple-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Ajouter un commentaire..." required>
                                <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded-lg mt-2 hover:bg-purple-700 transition">
                                    <i class="fas fa-paper-plane"></i> Commenter
                                </button>
                            </form>
                        </div>
                        @if(Auth::id() === $post->user_id)
                            <div class="p-4 border-t border-gray-200 flex space-x-2">
                                <a href="{{ route('posts.edit', $post) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-lg text-sm hover:bg-yellow-600 transition">
                                    <i class="fas fa-edit"></i> Modifier
                                </a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-lg text-sm hover:bg-red-600 transition">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.toggle-comments-btn').forEach(button => {
                button.addEventListener('click', function () {
                    let postId = this.getAttribute('data-post-id');
                    let commentsSection = document.getElementById('comments-' + postId);
                    commentsSection.classList.toggle('hidden');
                    this.innerHTML = commentsSection.classList.contains('hidden') ? '<i class="fas fa-comment"></i> Commentaires' : '<i class="fas fa-comment-slash"></i> Masquer les commentaires';
                });
            });
        });
    </script>
</x-app-layout>
</html>
