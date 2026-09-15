# Prerequis
    -php -v
    -composer -V
    -node -v
    -npm -v
# Créer le projet Laravel
    -composer create-project laravel/laravel mon-projet

# NB
##### SESSION_DRIVER 
    sert à déterminer où Laravel stocke temporairement les informations 
    de session d'un utilisateur, notamment lorsqu'il est connecté.

##### Migration
    évolution de la structure de la base de données 
        « Je veux créer cette table avec ces colonnes »,
        puis plus tard :
        « Je veux ajouter cette colonne »,
        etc.

##### Factory
    Factory sert à définir comment générer automatiquement des 
    données de test pour un Model c'est a dire COMMENT fabriquer des données

##### Seeders
    Les seeders permettent de remplir la base avec des données initiales ou de démonstration.
    Décide notamment quand et combien en créer.

#### down
    annuler un changement



# COMMANDES
##### creation modele et migration
    php artisan make:model --help 
    php artisan make:model nom_du_table --migration

##### migrer la table creer
    php artisan make:migration --help 
    php artisan migrate

#### ajouter colonne dans une table
    php artisan make:migration NOM_DE_LA_MIGRATION --table=NOM_DE_LA_TABLE

#### declarer un foreign key
    $table->foreignId('user_id')->constrained('nom_de_la_table');

#### regarder statut des tables
    php artisan migrate:status

