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
            <h1 class="text-2xl font-bold mb-6 text-purple-800">Demandes d'Amitié Reçues</h1>

            @if ($requests->isEmpty())
                <p class="text-gray-500">Aucune demande en attente.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($requests as $request)
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-transform">
                            <!-- En-tête de la carte -->
                            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-4">
                                <h2 class="text-lg font-semibold text-white">Demande de {{ $request->sender->name }}</h2>
                            </div>

                            <!-- Corps de la carte -->
                            <div class="p-4">
                                <div class="flex items-center space-x-4">
                                    <img src="{{ $request->sender->profile_photo ? asset('storage/' . $request->sender->profile_photo) : asset('default-avatar.png') }}" 
                                         alt="Photo de {{ $request->sender->name }}" 
                                         class="w-12 h-12 rounded-full border-2 border-purple-500 object-cover">
                                    <div>
                                        <p class="text-gray-800 font-medium">{{ $request->sender->name }}</p>
                                        <p class="text-sm text-gray-500">{{ $request->sender->email }}</p>
                                    </div>
                                </div>

                                <!-- Actions -->
                                <div class="mt-4 flex space-x-2">
                                    <form action="{{ route('friend.accept', $request->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" 
                                                class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">
                                            <i class="fas fa-check"></i> Accepter
                                        </button>
                                    </form>
                                    <form action="{{ route('friend.decline', $request->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" 
                                                class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                                            <i class="fas fa-times"></i> Refuser
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
</x-app-layout>
</html>