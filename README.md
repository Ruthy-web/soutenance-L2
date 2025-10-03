# Empire-Immo - Plateforme Immobilière

## Description

Empire-Immo est une plateforme web moderne de gestion immobilière développée avec Laravel et Livewire. Elle permet aux utilisateurs de rechercher, publier et gérer des biens immobiliers avec des fonctionnalités avancées comme les visites virtuelles 360°.

## Fonctionnalités Principales

### 🔐 Authentification

-   Inscription et connexion utilisateurs
-   Gestion des rôles (Locataire/Bailleur)
-   Réinitialisation de mot de passe
-   Vérification d'email

### 🏠 Gestion des Biens

-   CRUD complet des biens immobiliers
-   Upload d'images
-   Recherche avancée par critères
-   Géolocalisation (latitude/longitude)

### 🎥 Visites Virtuelles

-   Panoramas 360° interactifs
-   Hotspots de navigation
-   Interface utilisateur moderne
-   Support mobile

### 👥 Gestion des Utilisateurs

-   Tableau de bord personnalisé
-   Profil utilisateur
-   Administration des utilisateurs

## Technologies Utilisées

-   **Backend**: Laravel 12
-   **Frontend**: Livewire 3, Bootstrap 5
-   **Base de données**: SQLite
-   **Visites virtuelles**: Three.js
-   **Tests**: Pest PHP

## Installation

1. **Cloner le projet**

```bash
git clone <repository-url>
cd soutenance-L2
```

2. **Installer les dépendances**

```bash
composer install
npm install
```

3. **Configuration**

```bash
cp .env.example .env
php artisan key:generate
```

4. **Base de données**

```bash
php artisan migrate
php artisan db:seed
```

5. **Assets**

```bash
npm run build
```

6. **Démarrer le serveur**

```bash
php artisan serve
```

## Structure du Projet

```
app/
├── Http/Controllers/     # Contrôleurs
├── Livewire/            # Composants Livewire
├── Models/              # Modèles Eloquent
└── Services/            # Services métier

resources/
├── views/               # Vues Blade
├── js/                  # JavaScript (Three.js)
└── css/                 # Styles CSS

database/
├── migrations/          # Migrations
└── seeders/            # Seeders

public/
├── images/             # Images des biens
└── JS/                 # Assets JavaScript
```

## Routes Principales

-   `/` - Page d'accueil
-   `/connexion` - Connexion
-   `/creer_compte` - Inscription
-   `/biens` - Liste des biens
-   `/biens/create` - Créer un bien
-   `/virtual-tour` - Visite virtuelle
-   `/dashboard` - Tableau de bord

## Tests

```bash
php artisan test
```

## Fonctionnalités Avancées

### Visites Virtuelles

-   Panoramas 360° avec Three.js
-   Navigation par hotspots
-   Interface responsive
-   Support tactile

### Recherche Intelligente

-   Filtres par type, localisation, prix
-   Géolocalisation
-   Pagination

### Administration

-   Gestion des utilisateurs
-   Modération des biens
-   Statistiques

## Développement

### Ajout d'un nouveau bien

1. Accéder à `/biens/create`
2. Remplir le formulaire
3. Uploader une image
4. Sauvegarder

### Création d'une visite virtuelle

1. Préparer les images panoramiques
2. Configurer les hotspots
3. Tester la navigation

## Contribution

1. Fork le projet
2. Créer une branche feature
3. Commit les changements
4. Push vers la branche
5. Ouvrir une Pull Request

## Licence

Ce projet est sous licence MIT.

## Support

Pour toute question ou problème, contactez l'équipe de développement.
