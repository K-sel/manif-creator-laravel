# Application Laravel d'Organisation d'Événements

Cette application Laravel permet de créer et gérer des événements avec des validations spécifiques sur les dates et lieux. L'application inclut également l'envoi d'emails de confirmation.

## Fonctionnalités principales

- Formulaire de création d'événements avec validations avancées
- Restrictions sur les dates (l'événement doit durer entre 3 et 5 jours et commencer dans le futur)
- Validation du format du lieu (commence par une majuscule, minimum 3 caractères)
- Notification par email lors de la création d'un événement

## Prérequis

- PHP 8.1 ou supérieur
- Composer
- Node.js et NPM
- Mailpit (pour tester les emails localement)

## Installation

1. Clonez ce dépôt:
```bash
git clone ...
cd nom-du-projet
```

2. Installez les dépendances PHP & JavaScript:
```bash
composer install && npm install
```

3. Copiez le fichier d'environnement et générez la clé d'application:
```bash
cp .env.example .env && php artisan key:generate
```

4. Configurez votre base de données dans le fichier `.env`

5. Lancez les migrations:
```bash
php artisan migrate
```

## Lancement de l'application

Pour lancer l'application en mode développement, suivez ces étapes:

1. Démarrez le serveur Laravel:
```bash
php artisan serve
```

2. Lancez Mailpit dans un terminal séparé (si installé):
```bash
mailpit
```

3. Accédez à l'application:
   - Formulaire d'événements: [http://localhost:8000/](http://localhost:8000/)
   - Interface Mailpit pour voir les emails: [http://localhost:8025/](http://localhost:8025/)

## Structure du projet

- `app/Http/Requests/ContactRequest.php` : Définit les règles de validation pour le formulaire d'événement
- `app/Http/Controllers/` : Contient les contrôleurs qui gèrent les requêtes
- `resources/views/` : Contient les templates Blade pour l'interface utilisateur

## Contraintes de validation

- **Date de début** : 
  - Doit être dans le futur (au moins demain)
  - Format de date valide

- **Date de fin** : 
  - Doit être après la date de début
  - L'événement doit durer entre 3 et 5 jours

- **Lieu** : 
  - Minimum 3 caractères
  - Doit commencer par une majuscule suivie de minuscules

 Développé avec 💙 par K-sel
