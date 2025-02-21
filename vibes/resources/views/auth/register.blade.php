<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription - SocialNet</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-xl mx-auto">
            <!-- Logo -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-indigo-600">SocialNet</h1>
                <p class="mt-2 text-gray-600">Créez votre profil et rejoignez la communauté</p>
            </div>

            <!-- Formulaire -->
            <div class="bg-white rounded-xl shadow-xl p-8">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Photo de profil -->
                    <div class="text-center">
                        <div class="mb-4">
                            <div class="w-32 h-32 mx-auto bg-gray-100 rounded-full flex items-center justify-center border-2 border-dashed border-gray-300">
                                <i class="fas fa-user text-4xl text-gray-400"></i>
                            </div>
                        </div>
                        <label class="inline-flex items-center px-4 py-2 bg-indigo-50 rounded-md cursor-pointer hover:bg-indigo-100">
                            <i class="fas fa-camera mr-2 text-indigo-600"></i>
                            <span class="text-sm text-indigo-600">Choisir une photo</span>
                            <input id="profile_photo" type="file" name="profile_photo" class="hidden">
                        </label>
                        <x-input-error :messages="$errors->get('profile_photo')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <!-- Informations principales -->
                    <div class="grid grid-cols-1 gap-6">
                        <!-- Nom -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nom complet</label>
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                                <input id="name" name="name" type="text" :value="old('name')" required
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                                    placeholder="John Doe">
                            </div>
                            <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600" />
                        </div>

                        <!-- Pseudo -->
                        <div>
                            <label for="pseudo" class="block text-sm font-medium text-gray-700">Pseudo</label>
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-at text-gray-400"></i>
                                </div>
                                <input id="pseudo" name="pseudo" type="text" :value="old('pseudo')" required
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                                    placeholder="@johndoe">
                            </div>
                            <x-input-error :messages="$errors->get('pseudo')" class="mt-2 text-sm text-red-600" />
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                                <input id="email" name="email" type="email" :value="old('email')" required
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                                    placeholder="john@example.com">
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                        </div>

                        <!-- Bio -->
                        <div>
                            <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                            <div class="mt-1">
                                <textarea id="bio" name="bio" rows="4"
                                    class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                                    placeholder="Parlez-nous un peu de vous...">{{ old('bio') }}</textarea>
                            </div>
                            <x-input-error :messages="$errors->get('bio')" class="mt-2 text-sm text-red-600" />
                        </div>

                        <!-- Mot de passe -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <input id="password" name="password" type="password" required
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                        </div>

                        <!-- Confirmation mot de passe -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <input id="password_confirmation" name="password_confirmation" type="password" required
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-between pt-6">
                        <a href="{{ route('login') }}" class="text-sm text-indigo-600 hover:text-indigo-500">
                            Déjà inscrit ?
                        </a>
                        <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <i class="fas fa-user-plus mr-2"></i>
                            S'inscrire
                        </button>
                    </div>
                </form>
            </div>

            <!-- Footer -->
            <div class="mt-8 text-center text-sm text-gray-500">
                © 2025 SocialNet. Tous droits réservés.
            </div>
        </div>
    </div>
</body>
</html>