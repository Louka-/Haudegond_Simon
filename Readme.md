# Initialisation du projet
1. 
```bash
symfony new Haudegond_Simon --full
```
2. création de la database
    ->Modifier le .env pour accéder à la création de DB sous portgresql (id, mdp, DB_name)
    <!-- puis -->
```bash
symfony console doctrine:database:create
```

# Création des enttités et de leur relation
- une équipe peut avoir plusieurs joueurs. Relation many to one
```bash
symfony console make:entity
```

# Migration
```bash
symfony console make:migration
# puis
symfony console doctrine:migrations:migrate
```
# Fixtures
```bash
composer require orm-fixtures --dev
```

# Faire un CRUD pour l'entité Joueur
```bash
Symfony console make:crud
```

# Modifiaction du formulaire joueur et mise en page du formulaire via twig
form_themes: ['bootstrap_4_layout.html.twig']

# Alimenter la DB depuis les fixtures
- création des noms d'équipes et de trois Joueurs

# Mise en page des différentes vues


