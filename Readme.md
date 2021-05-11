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

# Création des entités et de leur relation
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



# Installation

#
# PostGreSQL
#
## Procedure d'installation
1. Installer PostGreSQL
2. 
```yaml
url : https://www.enterprisedb.com/downloads/postgres-postgresql-downloads
```
2. DLL dans php.ini

```bash
# 2 extensions a déticker
extension=pgsql
extension=pdo_pgsql
```

3. Installer l'interface PGAdmin
4. Configurer Symfony
```yaml
# dans config/packages/doctrine.yaml , ajouter:
dbal:
    driver: 'pdo_pgsql'
    charset: utf8
```
5. Connexion à PostGreSQL depuis le fichier .env
```bash
DATABASE_URL="postgresql://postgres:root@127.0.0.1:5432/db_Haudegond_Simon"
```
6. Céer la base de données
```bash
symfony console doctrine:database:create
```
7. Migration
```bash
# Effacer les migrations présentent dans le dossier migrations puis effectuer un :
symfony console make:migration
# puis
symfony console doctrine:migrations:migrate
```
8. Fixtures
```bash
symfony console doctrine:fixtures:load
```
9. Lancer le serveur
```bash
symfony serve
```


