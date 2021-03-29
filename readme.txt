https://medium.com/q-software/symfony-5-the-rest-the-crud-and-the-swag-7430cb84cd5
https://symfony.com/doc/current/bundles/SensioGeneratorBundle/commands/generate_doctrine_crud.html
https://gmanier.com/memo/3/le-crud-sous-symfony-4
https://symfony.com/blog/new-and-improved-generators-for-makerbundle

-- création de la structure du projet
> composer create-project symfony/website-skeleton crud

-- Chargement des composants 
> composer require symfony/web-server-bundle --dev ^4.4.2
> composer require symfony/orm-pack
> composer require --dev symfony/maker-bundle

fichier .env
DATABASE_URL=mysql://root:@127.0.0.1:3306/tutoriel

-- lancement du serveur
> php .\bin\console server:run

-- création de l'entité
> php bin/console make:entity   
> php bin/console make:migration
> php bin/console doctrine:migrations:migrate

-- FIxtures
> composer require fzaninotto/faker --dev
> composer require --dev orm-fixtures 

-- CRUD
> php bin/console make:crud Information
created: src/Controller/InformationController.php
created: src/Form/InformationType.php
created: templates/information/_delete_form.html.twig
created: templates/information/_form.html.twig
created: templates/information/edit.html.twig
created: templates/information/index.html.twig
created: templates/information/new.html.twig
created: templates/information/show.html.twig

 



