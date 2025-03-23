# ProjetLaravelR4.01
## Environnement d'execution : 
### Versions utilisés pour développer l'application
- Laravel 12.3.0
- Composer 2.8.6
- PHP 8.3.13
- MySQL 8.3.0

## Installation du projet : 
- cloner le repository GitHub 
```shell
git clone https://github.com/EtienneDumai/ProjetLaravelR4.01.git
cd sauces
```
- I. Installer les dépendances
```shell
composer install 
npm i 
```
- II. Configurer l'environnement d'execution
```shell
cp .env.example .env
```
- III. Configurer la base de données
Pour ce faire il fauit modifier une partie du .env.
```shell
#Type de base de données
DB_CONNECTION=
#Adresse IP de la base de données
DB_HOST=
#Port de la base de données
DB_PORT=
#Nom de la base de données
DB_DATABASE=
#Nom d'utilisateur permettant d'accèder à la base de données
DB_USERNAME=
#Mot de passe correspondant à l'utilisateur entrer utiliser pour accèder à la base de données
DB_PASSWORD=
```
- IV. Générer la clé d'application 
Le framework Laravel fonctionne avec une clé d'application, il faut donc la générer avec cette commande : 
```shell
php artisan key:generate
```
- V. Executer les migartions
Pour pouvoir faire fonctionné l'application correctement il faut créer les tables de la base de données, le framework Laravel dipose d'une commande qui le fait pour nous.
```shell
php artisan migrate
```
Laravel permet aussi de peupler les tables automatiquement aussi via une commande.
```shell
php artisan db:seed
```
Avec ces commandes les tables seront créées et peuplées automatiquement.

- VI. Démarrer le serveur local de développement
Après l'executions des migrations vous êtes prêt à utiliser l'application web, pour ce faire il vous faut ouvrir le serveur. Laravel fournit aussi une commande qui permet de faire cela.
```shell
php artisan serve
```
Le serveur s'ouvre et sera accessible à l'adresse `http://localhost:8000`

- VII. Tester l'application
Pour tester l'application il suffit d'acceder à l'URL [`http://localhost:8000`](http://localhost:8000), si tout s'est bien passez vous devriez pouvoir accèder à l'application.
- IIX. Fonctionnalités
Cette application permet de consulter les sauces déjà présente sur le site ainsi que de voir plus de détails d'une sauce en cliquant sur le bouton `Détails de la sauce`, il est aussi possible de créer sa propre sauce avec le bouton en bas à gauche de la page.