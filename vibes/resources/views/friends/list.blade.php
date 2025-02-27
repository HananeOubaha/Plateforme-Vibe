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
            <h1 class="text-2xl font-bold mb-6 text-purple-800">Liste des Amis</h1>

            @if ($friends->isEmpty())
                <p class="text-gray-500">Vous n'avez pas encore d'amis.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($friends as $friend)
                        @php
                            $friendUser = ($friend->sender_id == Auth::id()) ? $friend->receiver : $friend->sender;
                            $userName = $friendUser->pseudo ?? $friendUser->name; // Utilise le pseudo s'il existe, sinon le nom
                        @endphp
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-transform">
                            <!-- En-tête de la carte -->
                            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-4">
                                <h2 class="text-lg font-semibold text-white">{{ $userName }}</h2>
                            </div>

                            <!-- Corps de la carte -->
                            <div class="p-4">
                                <div class="flex items-center space-x-4">
                                    <img src="{{ $friendUser->profile_photo ? asset('storage/' . $friendUser->profile_photo) : asset('default-avatar.png') }}" 
                                         alt="Photo de {{ $userName }}" 
                                         class="w-12 h-12 rounded-full border-2 border-purple-500 object-cover">
                                    <div>
                                        <p class="text-gray-800 font-medium">{{ $userName }}</p>
                                        <p class="text-sm text-gray-500">{{ $friendUser->email }}</p>
                                    </div>
                                </div>

                                <!-- Bouton "Voir le profil" -->
                                <div class="mt-4">
                                    <a href="{{ route('users.show', $friendUser->id) }}" 
                                       class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition flex items-center justify-center space-x-2">
                                        <i class="fas fa-eye"></i>
                                        <span>Voir le profil</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
</html>