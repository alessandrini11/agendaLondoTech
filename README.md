# Installation
Télécharger et installer [composer](https://getcomposer.org/download/)
Télecharger et installer le [Cli de symfony](https://symfony.com/download)
- installer les dépendences du projet `composer install`
## Mise en place du projet
### Mise en place de la base de donné
Modifier le fichier `.env` pour rajouter vos variables d'environements
DATABASE_URL="mysql://`db_user`:`db_password`@127.0.0.1:3306/`db_name`?serverVersion=5.7"
- Création de la base de donnée `symfony console doctrine:database:create`
- Création des migration `symfony console make:migration`
- Faire migrer les migrations `symfony console doctrine:migration:migrate`
- Création de fausses données pour remplir la base de données `symfony console doctrine:fixtures:load`
### lancement du serveur de dévéloppement
- lancer le serveur `symfony serve`
```bash
Ouvrir l'application sur URL http://localhost:8000/
Entrez l'email : test@londo.cm et le mot de passe : demo
```
