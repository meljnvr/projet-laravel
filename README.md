# Site de petites annonces

Description du projet


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
