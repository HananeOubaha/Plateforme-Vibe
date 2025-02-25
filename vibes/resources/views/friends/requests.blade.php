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
        <h1 class="text-2xl font-bold mb-4">Demandes d'Amitié Reçues</h1>

        @if ($requests->isEmpty())
            <p class="text-gray-500">Aucune demande en attente.</p>
        @else
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">Pseudo</th>
                        <th class="border px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requests as $request)
                        <tr>
                            <td class="border px-4 py-2">{{ $request->sender->name }}</td>
                            <td class="border px-4 py-2 flex space-x-2">
                                <form action="{{ route('friend.accept', $request->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded">Accepter</button>
                                </form>
                                <form action="{{ route('friend.decline', $request->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Refuser</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
