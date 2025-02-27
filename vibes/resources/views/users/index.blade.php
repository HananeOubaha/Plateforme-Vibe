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
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4 text-purple-800">Liste des Utilisateurs</h1>

        <!-- Barre de recherche -->
        <form method="GET" action="{{ route('users.index') }}" class="mb-6">
            <div class="flex items-center space-x-2">
                <input type="text" name="search" placeholder="Rechercher par pseudo ou email"
                       value="{{ request('search') }}" 
                       class="border border-purple-300 p-2 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-purple-500">
                <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>

        <!-- Grille des utilisateurs -->
        @if(request('search'))
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($users as $user)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-transform">
                        <!-- Photo de profil -->
                        <div class="relative">
                            <img src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('default-avatar.png') }}"
                                 alt="Photo de {{ $user->pseudo }}" 
                                 class="w-full h-48 object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
                            <div class="absolute bottom-4 left-4 text-white">
                                <h2 class="text-xl font-semibold">{{ $user->pseudo }}</h2>
                                <p class="text-sm">{{ $user->name }}</p>
                            </div>
                        </div>

                        <!-- Informations et actions -->
                        <div class="p-4">
                            <p class="text-gray-600">{{ $user->email }}</p>
                            <div class="mt-4 flex space-x-2">
                                @if(Auth::id() !== $user->id)
                                    <form method="POST" action="{{ route('friend.request', $user->id) }}">
                                        @csrf
                                        <button type="submit" 
                                                class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition">
                                            <i class="fas fa-user-plus"></i> Ajouter
                                        </button>
                                    </form>
                                @endif
                                <a href="{{ route('users.show', $user->id) }}" 
                                   class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                                    <i class="fas fa-eye"></i> Profil
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center p-6">
                        <p class="text-gray-500">Aucun utilisateur trouvé.</p>
                    </div>
                @endforelse
            </div>
        @endif

        <!-- Pagination -->
        <div class="mt-6">
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>