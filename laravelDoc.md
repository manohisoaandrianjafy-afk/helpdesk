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

#### fillable 
    dans un modèle pour définir les champs autorisés lors d'une création :
    sert à définir quels champs d'un modèle peuvent être remplis automatiquement avec des données

#### plainTextToken 
    sert à récupérer le token d'API en clair



# COMMANDES
##### creation modele et migration 
    php artisan make:model --help 
    php artisan make:model nom_du_table --migration

##### creation controller
    php artisan make:controller nom 

##### migrer la table creer
    php artisan make:migration --help 
    php artisan migrate

#### ajouter colonne dans une table
    php artisan make:migration NOM_DE_LA_MIGRATION --table=NOM_DE_LA_TABLE

#### declarer un foreign key
    $table->foreignId('user_id')->constrained('nom_de_la_table');

#### regarder statut des tables
    php artisan migrate:status

#### activer les routes API
    php artisan install:api



# RELATIONS ELOQUENT 
    Plus besoin de gérer manuellement la jointure SQL.
#### hasMany()
    exemple
        -côté User : un utilisateur a plusieurs tickets → hasMany()

#### belongsTo()
    exemple
        -côté Ticket : un ticket appartient à un utilisateur → belongsTo()



# SANCTUM
    va nous permettre de gérer l'authentification de notre API
    exemple :

    Utilisateur
        ↓
    POST /api/login
        ↓
    Laravel vérifie email + mot de passe
        ↓
    Sanctum crée un token
        ↓
    Client Vue reçoit le token
        ↓
    Client utilise le token pour accéder aux routes protégées

# HASH
    -Hash::make()->Hasher quelque chose
    -Hash::check()->Verifier 

# MIDDLEWARE
    -intercepter la requête avant qu'elle arrive au contrôleur.
    exemple
    Requête
        ↓
    auth:sanctum
        ↓
    role:admin
        ↓
    Controller

    -php artisan make:middleware RoleMiddleware