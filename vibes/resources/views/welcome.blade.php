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
<body class="bg-gray-50">
    <nav class="bg-indigo-600 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="text-2xl font-bold">SocialNet</span>
                </div>
                
                <div class="hidden sm:flex items-center space-x-4">
                    @if (Route::has('login'))
                        <div class="flex space-x-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="px-3 py-2 rounded-md hover:bg-indigo-500">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="px-3 py-2 rounded-md hover:bg-indigo-500">Connexion</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="px-3 py-2 rounded-md bg-white text-indigo-600 hover:bg-indigo-100">Inscription</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Section Profils -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center mb-6">
                    <i class="fas fa-users text-2xl text-indigo-600"></i>
                    <h2 class="ml-3 text-xl font-semibold text-gray-900">Gérez vos profils</h2>
                </div>
                <p class="text-gray-600 mb-4">
                    Créez et personnalisez votre profil professionnel. Partagez vos expériences et connectez-vous avec d'autres membres.
                </p>
                <a href="#" class="inline-flex items-center text-indigo-600 hover:text-indigo-500">
                    En savoir plus
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Section Communauté -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center mb-6">
                    <i class="fas fa-comments text-2xl text-indigo-600"></i>
                    <h2 class="ml-3 text-xl font-semibold text-gray-900">Rejoignez la communauté</h2>
                </div>
                <p class="text-gray-600 mb-4">
                    Participez aux discussions, partagez vos idées et développez votre réseau professionnel.
                </p>
                <a href="#" class="inline-flex items-center text-indigo-600 hover:text-indigo-500">
                    Découvrir
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Section Actualités -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center mb-6">
                    <i class="fas fa-newspaper text-2xl text-indigo-600"></i>
                    <h2 class="ml-3 text-xl font-semibold text-gray-900">Actualités & Événements</h2>
                </div>
                <p class="text-gray-600 mb-4">
                    Restez informé des dernières actualités et événements de votre réseau professionnel.
                </p>
                <a href="#" class="inline-flex items-center text-indigo-600 hover:text-indigo-500">
                    Voir plus
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- Section Resources -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center mb-6">
                    <i class="fas fa-book text-2xl text-indigo-600"></i>
                    <h2 class="ml-3 text-xl font-semibold text-gray-900">Ressources</h2>
                </div>
                <p class="text-gray-600 mb-4">
                    Accédez à des ressources exclusives pour développer vos compétences et votre carrière.
                </p>
                <a href="#" class="inline-flex items-center text-indigo-600 hover:text-indigo-500">
                    Explorer
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-12 pt-8 border-t border-gray-200">
            <div class="flex justify-between items-center text-gray-500 text-sm">
                <div class="flex items-center space-x-4">
                    <a href="#" class="hover:text-indigo-600">À propos</a>
                    <a href="#" class="hover:text-indigo-600">Contact</a>
                    <a href="#" class="hover:text-indigo-600">Confidentialité</a>
                </div>
                <div>
                    <span>© 2025 SocialNet. Tous droits réservés.</span>
                </div>
            </div>
        </footer>
    </main>
</body>
</html>