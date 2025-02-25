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
        <h1 class="text-2xl font-bold mb-4">Liste des Utilisateurs</h1>

        <form method="GET" action="{{ route('users.index') }}" class="mb-4 flex space-x-2">
            <input type="text" name="search" placeholder="Rechercher par pseudo ou email"
                   value="{{ request('search') }}" class="border p-2 rounded w-full">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Rechercher</button>
        </form>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">Photo</th>
                        <th class="border px-4 py-2">Pseudo</th>
                        <th class="border px-4 py-2">Email</th>
                        <th class="border px-4 py-2">Nom</th>
                        <th class="border px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="text-center">
                            <td class="border px-4 py-2">
                                <img src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('default-avatar.png') }}"
                                     alt="Photo de {{ $user->pseudo }}" class="h-10 w-10 rounded-full mx-auto">
                            </td>
                            <td class="border px-4 py-2">{{ $user->pseudo }}</td>
                            <td class="border px-4 py-2">{{ $user->email }}</td>
                            <td class="border px-4 py-2">{{ $user->name }}</td>
                            <td class="border px-4 py-2">
                                @if(Auth::id() !== $user->id)
                                    <form method="POST" action="{{ route('friend.request', $user->id) }}">
                                        @csrf
                                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
                                            Ajouter Ami
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center p-4">Aucun utilisateur trouvé</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $users->links() }} <!-- Pagination -->
        </div>
    </div>
</x-app-layout>
