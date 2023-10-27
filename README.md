# Site de petites annonces

Développement d'une Plateforme d'Annonces de Biens d'Occasion
avec Interface d'Administration sur Laravel

## Installation du projet

1. Cloner le repository  
    * git clone https://github.com/meljnvr/projet-laravel.git

2. Lancer les dépendences
    * composer install
    * npm install
    * npm run dev

3. Lancer le serveur  
    * php artisan serve 

4. Créer une BDD  
    * dans le .env, renseigner le nom de la bdd : DB_DATABASE= (nom)
    * lancer les migrations : php artisan migrate 

5. Lancer les factories  
    * php artisan db:seed


## Liste des fonctionnalités

### Obligatoires

* une page public avec toutes les annonces listées / pus page de détail pour
chaque annonce
* Un utilisateur doit être connecté pour créer une annonce. L’utilisateur pourra
effectuer les actions de crud sur son annonce. Un utilisateur ne pourra pas
altérer les annonces des autres utilisateurs.
* Un utilisateur connecté peut voir le contact d’un autre utilisateur pour le
contacter sur une annonce.
* Un utilisateur non connecté peut voir une annonce mais pas les informations de
contact.
* Lorsqu’un admin se connecte, il a accès à un crud gérer les annonces.

### Supplémentaires

* Filtres et réorganisation des annonces par prix (croissant ou décroissant)