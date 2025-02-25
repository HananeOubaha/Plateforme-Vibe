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
        <h1 class="text-2xl font-bold mb-4">Liste des Amis</h1>

        @if ($friends->isEmpty())
            <p class="text-gray-500">Vous n'avez pas encore d'amis.</p>
        @else
            <ul class="list-disc pl-5">
                @foreach ($friends as $friend)
                    @php
                        $friendUser = ($friend->sender_id == Auth::id()) ? $friend->receiver : $friend->sender;
                    @endphp
                    <li class="py-2">
                        {{ $friendUser->name }} ({{ $friendUser->email }})
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</x-app-layout>
