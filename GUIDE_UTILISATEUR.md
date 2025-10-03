# 🏠 GUIDE UTILISATEUR - PLATEFORME IMMOBILIÈRE LARAVEL

## 📋 TABLE DES MATIÈRES

1. [Installation et Configuration](#installation-et-configuration)
2. [Fonctionnalités Principales](#fonctionnalités-principales)
3. [Gestion des Biens](#gestion-des-biens)
4. [Visite Virtuelle](#visite-virtuelle)
5. [Génération de Panoramas](#génération-de-panoramas)
6. [Système de Paiement](#système-de-paiement)
7. [API et Intégrations](#api-et-intégrations)
8. [Tests et Déploiement](#tests-et-déploiement)
9. [Dépannage](#dépannage)

---

## 🚀 INSTALLATION ET CONFIGURATION

### Prérequis

-   **PHP** 8.3+
-   **Laravel** 12.32.5
-   **Node.js** 18+
-   **Python** 3.8+ (pour le stitching de panoramas)
-   **MySQL/SQLite** (base de données)

### Installation

```bash
# Cloner le projet
git clone <repository-url>
cd soutenance-L2

# Installer les dépendances PHP
composer install

# Installer les dépendances Node.js
npm install

# Configuration
cp .env.example .env
php artisan key:generate

# Base de données
php artisan migrate
php artisan db:seed

# Lier le storage public (IMPORTANT)
php artisan storage:link

# Variables d'environnement importantes
PYTHON_BIN=python3  # Chemin vers Python
QUEUE_CONNECTION=database  # Pour les tâches asynchrones
```

### Démarrage

```bash
# Serveur de développement
php artisan serve

# Ou avec queue worker
composer run dev
```

---

## 🎯 FONCTIONNALITÉS PRINCIPALES

### URLs Principales

-   **Accueil** : http://127.0.0.1:8000/
-   **CRUD Biens** : http://127.0.0.1:8000/biens
-   **Visite Virtuelle** : http://127.0.0.1:8000/virtual-tour
-   **Génération Panorama** : POST http://127.0.0.1:8000/assemble-panorama

### Navigation

-   Barre de navigation Bootstrap avec icônes Font Awesome
-   Liens directs vers toutes les fonctionnalités
-   Interface responsive et moderne

---

## 🏘️ GESTION DES BIENS

### CRUD Complet avec Livewire

#### 1. **Liste des Biens** (`/biens`)

-   **Recherche en temps réel** par titre et localisation
-   **Pagination** automatique (10 biens par page)
-   **Actions** : Modifier, Supprimer avec confirmation
-   **Affichage** : Titre, Localisation, Type, Prix formaté

#### 2. **Création** (`/biens/create`)

-   **Formulaire complet** avec validation
-   **Upload d'image** (max 4MB, formats image)
-   **Champs** :
    -   Titre (requis)
    -   Description (requis)
    -   Localisation (requis)
    -   Surface en m² (requis, min 1)
    -   Chambres (requis, min 0)
    -   Salles de bain (requis, min 0)
    -   Type (requis)
    -   Prix en XAF (optionnel)
    -   Latitude/Longitude (optionnel)

#### 3. **Modification** (`/biens/{id}/edit`)

-   Même formulaire que la création
-   Pré-remplissage des données existantes
-   Possibilité de changer l'image

#### 4. **Suppression**

-   Bouton dans la liste avec confirmation JavaScript
-   Suppression immédiate de la base de données

### Stockage des Images

-   **Emplacement** : `storage/app/public/biens/`
-   **URL publique** : `/storage/biens/{filename}`
-   **Prévisualisation** : Affichage immédiat lors de l'upload

---

## 🎥 VISITE VIRTUELLE

### Interface Pannellum

-   **Moteur 3D** : Pannellum (bibliothèque panoramique)
-   **Navigation** : Souris, clavier, tactile
-   **Contrôles** : Zoom, plein écran, rotation automatique

### Configuration des Panoramas

```php
// Dans VirtualTourController@show
$panoramas = [
    'salon' => [
        'name' => 'Salon',
        'image' => '/images/panorama1.jpg',
        'info' => [
            'title' => 'Salon Principal',
            'description' => 'Espace de vie spacieux...'
        ],
        'hotspots' => [
            [
                'position' => ['x' => 200, 'y' => 0, 'z' => 100],
                'type' => 'navigation',
                'label' => 'Aller à la cuisine',
                'target' => 'cuisine'
            ]
        ]
    ]
];
```

### Types de Hotspots

1. **Navigation** : Passage entre panoramas
2. **Info** : Affichage d'informations détaillées
3. **Media** : Images, vidéos YouTube

### Contrôles Disponibles

-   **Rotation automatique** : Switch dans la sidebar
-   **Zoom** : Molette souris, boutons +/-
-   **Navigation** : Clic sur hotspots
-   **Plein écran** : Bouton dédié

---

## 🖼️ GÉNÉRATION DE PANORAMAS

### Service Python Intégré

-   **Script** : `panorama-processing/stitch.py`
-   **Service Laravel** : `StitchPanoramaService`
-   **Job Queue** : `GeneratePanorama`

### API Endpoint

```bash
POST /assemble-panorama
Content-Type: application/json

{
    "inputs": ["/images/panorama1.jpg", "/images/panorama2.jpg"],
    "output": "mon_panorama.jpg",
    "async": false
}
```

### Réponses

```json
// Succès synchrone
{
    "status": "ok",
    "url": "/storage/panoramas/mon_panorama.jpg"
}

// Succès asynchrone
{
    "status": "queued"
}
```

### Configuration

-   **Variable d'env** : `PYTHON_BIN=python3`
-   **Timeout** : 300 secondes par défaut
-   **Stockage** : `storage/app/public/panoramas/`
-   **Queue** : `panoramas` (si async=true)

### Exécution Asynchrone

```bash
# Lancer le worker de queue
php artisan queue:work --queue=panoramas
```

---

## 💳 SYSTÈME DE PAIEMENT

### Validation des Paiements

```bash
POST /paiement
Content-Type: application/json

{
    "montant": 50000,
    "methode": "orange_money",
    "reference": "REF123"
}
```

### Méthodes Supportées

-   `orange_money` : Orange Money
-   `mtn_momo` : MTN Mobile Money
-   `paypal` : PayPal
-   `stripe` : Stripe

### Validation

-   **Montant** : Entier ≥ 100 XAF
-   **Méthode** : Enum des méthodes supportées
-   **Référence** : Optionnelle, max 100 caractères

### Logs et Traçabilité

-   **Événements** : Logs automatiques des tentatives
-   **Fichier** : `storage/logs/laravel.log`
-   **Format** : JSON avec toutes les données

---

## 🔌 API ET INTÉGRATIONS

### Routes API Virtual Tour

```bash
# Tous les panoramas
GET /api/virtual-tour/panoramas

# Panorama spécifique
GET /api/virtual-tour/panorama/{id}

# Sauvegarder configuration (auth requis)
POST /api/virtual-tour/configuration
```

### Intégration Python

```php
// Utilisation du service
$service = app(StitchPanoramaService::class);
$result = $service->run($inputs, $outputFilename);

// Ou via Job
GeneratePanorama::dispatch($inputs, $outputFilename);
```

---

## 🧪 TESTS ET DÉPLOIEMENT

### Tests Disponibles

```bash
# Lancer tous les tests
php artisan test

# Tests spécifiques
php artisan test --filter PanoramaGenerationTest
php artisan test --filter BienCrudTest
```

### Tests Implémentés

1. **PanoramaGenerationTest** : Validation des paramètres
2. **BienCrudTest** : Chargement des pages CRUD

### Commandes de Maintenance

```bash
# Nettoyer les caches
php artisan config:clear
php artisan view:clear
php artisan cache:clear

# Optimiser l'autoloader
composer dump-autoload --optimize

# Migrations
php artisan migrate:fresh --seed
```

---

## 🔧 DÉPANNAGE

### Problèmes Courants

#### 1. **Erreur 404 sur les assets**

```bash
# Vérifier le lien storage
php artisan storage:link

# Vérifier les permissions
chmod -R 755 storage/
chmod -R 755 public/
```

#### 2. **Erreur Python**

```bash
# Vérifier Python
which python3
python3 --version

# Variable d'environnement
echo $PYTHON_BIN
```

#### 3. **Queue Worker ne fonctionne pas**

```bash
# Vérifier la configuration queue
php artisan config:show queue

# Lancer le worker
php artisan queue:work --verbose
```

#### 4. **Erreurs Livewire**

```bash
# Nettoyer les caches
php artisan view:clear
php artisan livewire:discover
```

### Logs et Debug

-   **Logs Laravel** : `storage/logs/laravel.log`
-   **Debug mode** : `APP_DEBUG=true` dans `.env`
-   **Console** : `php artisan tinker`

### Performance

-   **Cache des vues** : `php artisan view:cache`
-   **Cache des routes** : `php artisan route:cache`
-   **Cache de config** : `php artisan config:cache`

---

## 📚 RESSOURCES SUPPLÉMENTAIRES

### Documentation

-   **Laravel** : https://laravel.com/docs
-   **Livewire** : https://livewire.laravel.com/docs
-   **Pannellum** : https://pannellum.org/documentation/
-   **Three.js** : https://threejs.org/docs/

### Structure du Projet

```
app/
├── Http/Controllers/     # Contrôleurs Laravel
├── Livewire/            # Composants Livewire
├── Models/              # Modèles Eloquent
├── Services/            # Services métier
└── Jobs/               # Tâches asynchrones

resources/
├── views/              # Vues Blade
└── js/                # JavaScript personnalisé

public/
├── assets/            # Bibliothèques externes
├── images/           # Images statiques
└── storage/          # Fichiers uploadés
```

### Support

Pour toute question ou problème :

1. Vérifier les logs dans `storage/logs/`
2. Consulter la documentation Laravel/Livewire
3. Tester avec `php artisan tinker`
4. Utiliser les outils de debug du navigateur

---

**🎉 Félicitations ! Votre plateforme immobilière Laravel est maintenant opérationnelle avec toutes ses fonctionnalités avancées.**

