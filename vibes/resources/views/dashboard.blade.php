@php
    $user = auth()->user();
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <!-- Image de couverture -->
                <div class="bg-gradient-to-r from-indigo-500 to-purple-600 h-32"></div>

                <div class="p-6 text-gray-900">
                    <!-- Profil utilisateur -->
                    <div class="flex flex-col items-center -mt-16">
                        <!-- Image de profil -->
                        <img class="w-32 h-32 rounded-full border-4 border-white shadow-md"
                             src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('images/default-avatar.png') }}"
                             alt="Photo de profil">

                        <!-- Informations utilisateur -->
                        <h3 class="mt-4 text-2xl font-semibold text-gray-900">{{ $user->name }}</h3>
                        <p class="text-gray-600">{{ $user->email }}</p>
                        <p class="mt-2 text-gray-700 text-center max-w-lg">
                            {{ $user->bio ?? "Aucune bio disponible." }}
                        </p>

                        <!-- Bouton d'édition -->
                        <a href="{{ route('profile.edit') }}"
                           class="mt-4 px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition">
                            Modifier le profil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
