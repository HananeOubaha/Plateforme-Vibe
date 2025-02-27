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
    <div class="py-12 bg-gray-100">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
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

            <!-- Publications de l'utilisateur -->
            <div class="mt-6 bg-white shadow-lg rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-4">Publications de {{ $user->pseudo }}</h2>
                @forelse ($posts as $post)
                <div class="border-b pb-4 mb-4">
    <h3 class="text-lg font-semibold">{{ $post->title }}</h3>
    <p class="text-gray-700">{{ $post->content }}</p>

    @if($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" 
             alt="Image de la publication" 
             class="w-full h-64 object-cover rounded-lg mt-2">
    @endif

    <span class="text-sm text-gray-500">{{ $post->created_at->format('d/m/Y à H:i') }}</span>
</div>
                @empty
                    <p class="text-gray-600">Aucune publication.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
