
# Vibe - Extension Sociale

## Description
Vibe évolue en un réseau social dynamique permettant aux utilisateurs d'interagir via des publications, l'ajout d'amis et un fil d'actualités interactif.

## Fonctionnalités

### 1. Ajout d’Amis
- Envoi de demandes d’amis.
- Acceptation ou refus d’une demande d’ami.
- Affichage de la liste des amis.

### 2. Système de Publications
- Possibilité de publier du texte et des images.
- Modification et suppression de posts.
- Affichage des publications triées par date.

### 3. Fil d’Actualités
- Affichage des publications des amis.
- Tri des posts du plus récent au plus ancien.

### 4. Consultation des Profils
- Accès au profil d’un utilisateur.
- Affichage des publications et interactions d’un utilisateur.

### 5. Likes et Commentaires
- Ajout de likes aux posts.
- Affichage du nombre total de likes sur chaque post.
- Ajout et affichage des commentaires sous chaque post.

### 6. Fonctionnalités Avancées
- Notifications en temps réel pour les demandes d’amis et les interactions sur les posts.
- Ajout d’un système de partage pour diffuser les publications.
- Implémentation d’une pagination infinie pour le fil d’actualités.

## Installation

1. **Cloner le projet**
   ```bash
   git clone https://github.com/nom-utilisateur/Vibe-Social.git





























<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
# Vibe - Plateforme de Réseau Social Sécurisé

## Description
Vibe est une jeune startup qui souhaite offrir une plateforme simple et efficace permettant aux utilisateurs de s'inscrire, personnaliser leur profil et retrouver facilement d'autres membres grâce à un système de recherche performant.

## Fonctionnalités Principales

### 1. Authentification et Gestion des Utilisateurs
- 🔒 Inscription et connexion sécurisées.
- 🔄 Gestion de la récupération de mot de passe.
- ✅ Vérification des emails (optionnelle mais recommandée).
- ⚙️ Implémentation de Laravel Breeze ou Jetstream pour l'authentification.

### 2. Gestion du Profil Utilisateur
- ✏️ Modification des informations personnelles : pseudo unique, nom, prénom, email (après vérification), bio et photo de profil.
- 🔑 Changement du mot de passe avec vérification de l'ancien mot de passe.

### 3. Recherche d'Utilisateurs
- 🔎 Système de recherche performant permettant de trouver un utilisateur par pseudo ou email.

### 4. Fonctionnalités Bonus
- 🤝 Ajout d'autres utilisateurs à une liste d'amis.
- 📩 Notifications en temps réel pour les demandes d'amitié.
- ✔️ Accepter ou refuser une demande d'amitié.

## Technologies Utilisées
- **Backend** : Laravel (avec Laravel Breeze ou Jetstream pour l'authentification)
- **Frontend** : Blade, Vue.js ou React (au choix)
- **Base de données** : MySQL ou PostgreSQL
- **Sécurité** : Laravel Sanctum ou Passport pour la gestion des tokens d'authentification
- **Notifications** : Laravel Echo + Pusher

## Installation

### Prérequis
Assurez-vous d'avoir les éléments suivants installés sur votre machine :
- PHP >= 8.0
- Composer
- Node.js & npm
- MySQL ou PostgreSQL

### Étapes d'installation
```sh
# Cloner le projet
git clone https://github.com/votre-repo/vibe.git
cd vibe

# Installer les dépendances backend
composer install

# Configurer l'environnement
cp .env.example .env
# Modifier le fichier .env avec vos informations de base de données

# Générer la clé d'application
php artisan key:generate

# Migrer la base de données
php artisan migrate

# Installer les dépendances frontend
npm install && npm run dev

# Lancer le serveur
php artisan serve
```

## Utilisation
- Accédez à l'application via `http://127.0.0.1:8000`
- Inscrivez-vous et explorez les fonctionnalités

## Contribution
Les contributions sont les bienvenues ! Veuillez suivre les étapes suivantes :
1. **Forker** le projet
2. **Créer une nouvelle branche** (`feature/nouvelle-fonctionnalité`)
3. **Effectuer les modifications**
4. **Soumettre une pull request**

## Licence
Ce projet est sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus de détails.
