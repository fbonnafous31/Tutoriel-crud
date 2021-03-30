# Tutoriel CRUD Symfony

***
Description de la fonctionnalité CRUD de Symfony<br>
Création d'un formulaire avec CRUD en ligne de commande sans écrire une ligne de code<br>

## Table des matières

  - [Configuration des composants](#configuration-des-composants)
  - [Configuration base de données](#configuration-base-de-données)
  - [Entité](#entité)
  - [Jeu de données](#jeu-de-données)
  - [Création du CRUD](#création-du-crud)
  - [Visualisation du formulaire](#visualisation-du-formulaire)
  - [Ressources](#ressources)

## Configuration des composants

Chargement des composants nécessaires au fonctionnement de l'application (serveur Web, base de données)

- composer require symfony/web-server-bundle --dev ^4.4.2
- composer require symfony/orm-pack
- composer require --dev symfony/maker-bundle

Création de la structure du projet

- composer create-project symfony/website-skeleton crud

## Configuration base de données

Mise à jour du fichier de configuration de la base de données (fichier .env à la racine du projet)

DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7"

## Entité

Création d'une entité pour mon formulaire, création du fichier de migration et mise à jour de la base de données
Dans mon exemple je vais créer une entité 'Information' qui stockera des noms d'informations et leur détail

> Création de l'entité Information (nom, détails)
- php bin/console make:entity

> Création du script de migration<br>
> \migrations\Version20210329095500.php
- php bin/console make:migration

> Mise à jour de la structure au niveau de la base de données
- php bin/console doctrine:migrations:migrate

## Jeu de données

Chargement des composants permettant la création de jeux de données
\src\DataFixtures\AppFixtures.php

- composer require fzaninotto/faker --dev
- composer require --dev orm-fixtures

Ecriture d'un script qui va générer 10 informations à l'aide du composant Faker 

![alt text](public/images/fixtures.png)

## Création du CRUD

La commande de génération du CRUD va créer automatiquement :
- le contrôleur pour l'entité avec des fonctions permettant
  - la visualisation de la liste des informations
  - la visualisation d'une fiche information
  - la création d'une nouvelle information
  - la mise à jour d'une information 
  - la suppression d'une information
- un formulaire par défaut 
- des templates permettant de visualiser, créer ou modifier les informations

- php bin/console make:crud Information

created: src/Controller/InformationController.php<br>
![alt text](public/images/controller.png)
created: src/Form/InformationType.php<br>
created: templates/information/_delete_form.html.twig<br>
created: templates/information/_form.html.twig<br>
created: templates/information/edit.html.twig<br>
created: templates/information/index.html.twig<br>
created: templates/information/new.html.twig<br>
created: templates/information/show.html.twig<br>

## Visualisation du formulaire

Il reste juste à améliorer le design en incorporant du Bootstrap aux templates par exemple.

- php .\bin\console server:run

http://127.0.0.1:8001/information/          (liste des informations)<br>
![alt text](public/images/InformationList.png)<br>
http://127.0.0.1:8001/information/1         (fiche information numéro 1)<br>
![alt text](public/images/InformationDetail.png)<br>
http://127.0.0.1:8001/information/new       (créer une nouvelle information)<br>
![alt text](public/images/InformationCreate.png)<br>
http://127.0.0.1:8001/information/1/edit    (modification de l'information numéro 1)<br>
![alt text](public/images/InformationEdit.png)<br>
http://127.0.0.1:8001/information/1         (supprimer information numéro 1)<br>
![alt text](public/images/InformationDelete.png)

## Ressources

https://medium.com/q-software/symfony-5-the-rest-the-crud-and-the-swag-7430cb84cd5<br>
https://github.com/fzaninotto/Faker<br>
