Démonstration de projet
==================================

## Environnement Docker ##

Ce projet nécessite un environnement Docker adapté. Vous pouvez utiliser l'environnement "*local*" basé sur [Docker Desktop](https://docs.docker.com/docker-for-windows/install/).

Si vous utilisez le logiciel [Docker Desktop](https://docs.docker.com/docker-for-windows/install/), vous pouvez utiliser l'image Docker "[mattrayner/lamp](https://hub.docker.com/r/mattrayner/lamp)". Une fois votre container crée, il vous faudra vérifier et corriger si nécessaire chacun des points suivants :
  * votre *VirtualHost Apache* pointe bien sur le répertoire `public` de votre application (modification de ***DocumentRoot*** en `/var/www/html/public` et de l'instruction ***Directory*** à la ligne en dessous, en début du fichier `/etc/apache2/sites-available/000-default.conf`) : 
  * module *"rewrite"* activé sous Apache : `a2enmod rewrite && service apache2 reload` 
  * que le module "sqlite3" correspondant à votre version de PHP est bien installé. Par exemple pour une version PHP 8.0 : `apt update && apt install php-sqlite3`
  * terminez les modifications des configurations en actualisant Apache : `service apache2 reload`
Le projet se base sur une gestion des données en **SQLite**, et non via MySQL ou MariaDB.


## Lancement du projet ##

Pour les instructions suivantes, nous partirons du principe que vous avez un mappage du port `1234` (*PC hôte*) vers le port `80` de votre container.

Une fois votre environnement Docker lancé, utilisez un terminal pour vous y connecter. Executez `composer self-update` *(mise à jour de Composer)* et procéder à l'installation du projet (`git clone https://git.formation.aliptic.net/Equipe_ALIPTIC/Exemple_Projet_Symfony .`) et à la mise à jour de ses dépendances (toujours avec Composer, `composer update`, à la racine du projet). 

**Si nécessaire**, créez un fichier `.env.local` afin d'y renseigner vos paramètres locaux.

N'oubliez pas d'initialiser la base de données et son contenu. Pour ce faire, executer les commandes suivantes : 
  * `php bin/console make:migration` : prépare la migration des données
  * `php bin/console doctrine:migrations:migrate` : rend effectifs les modifications en base de données
  * `php bin/console doctrine:fixtures:load` : injecte les *"fixtures"*, c'est à dire les données par défaut, en base de données

Puis enfin, accédez au projet Symfony par l'intermédiaire de votre navigateur, en saisissant l'URL [http://localhost:1234](http://localhost:1234). 

**Si une erreur SQL est retournée lors de l'ajout ou la modification de données en BDD, il est possible que votre base SQLite soit en lecture seule. Pour y remédier : `chmod 777 /var/www/html/var/menu.db`**


## Présentation du projet ##

Le projet proposé pose les bases d'une gestion de menu. Ce projet simpliste gère des **plats** et des **catégories de plat**

Pour chaque plat, une gestion [CRUD](https://fr.wikipedia.org/wiki/CRUD) est déjà implémentée, avec des interfaces déjà mise en place : listing / édition / ajout / suppression de données. Il en est de même pour les catégories de plat.

Les **`Plats`** sont définis par les caractéristiques suivantes :
  * `id` : identifiant unique du plat
  * `titre` : titre du plat
  * `category` : catégorie du plat -> liaison avec les données **`Category`**
  * `description` : contenu du plat

Les **`Category`** seront définies par les caractéristiques suivantes : 
  * `id` : identifiant unique de la catégorie
  * `name` : nom de la catégorie


## Consignes de réalisation ##

En vous basant sur le code proposé, vous proposerez l'**enrichissement d'interface** de l'outil. 
Il vous faudra donc : 
  * ajouter Bootstrap au projet, de la manière la plus adaptée
  * personnaliser en CSS et en Javascript ***(parte JS optionnelle)*** la totalité des pages du site internet
  * gérer aux mieux vos *assets* (fichiers CSS, JS, images, ....)
  * déposer votre production sur un espace Git suivant les consignes précisées dans le sujet du CIEL (format PDF)


## Rappels d'URL du projet ##

  * [Page d'accueil](http://localhost:1234) -> redirection vers [http://localhost:1234](http://localhost:1234/plat)
  * [Page de listing d'plats](http://localhost:1234/plat)
  * Page de détails d'un plat dont l'identifiant unique est **1** : [http://localhost:1234/plat/1/](http://localhost:1234/plat/1/)
  * Page d'édition d'un plat dont l'identifiant unique est **1** : [http://localhost:1234/plat/1/edit/](http://localhost:1234/plat/1/edit/)
  * [Page d'ajout d'un plat](http://localhost:1234/plat/new/)
  * [Page de listing des catégories](http://localhost:1234/category)
  * Page de détails d'une catégorie dont l'identifiant unique est **1** : [http://localhost:1234/category/1/](http://localhost:1234/category/1/)
  * Page d'édition d'une catégorie dont l'identifiant unique est **1** : [http://localhost:1234/category/1/edit/](http://localhost:1234/category/1/edit/)
  * [Page d'ajout d'une categorie](http://localhost:1234/category/new/)

