# Projet Symfony Demo

## Dépendance à installer

- Php
- Mysql
- Composer
- Git
- Symfony cli

## Installer Symfony

dans un terminal faire les commandes suivantes depuis votre répoertoire de travail

```bash
symfony new --full demo
```
Ou cloner le projet depuis github
```cmd
git clone https://github.com/olivierPoussel/symdony-demo-b3-web.git
cd symdony-demo-b3-web
composer install
# configurer la bdd dans le .env ou .env.local voir ci-après.
php bin/console doctrine:database:create
php bin/console doctrine:migration:migrate
php bin/console doctrine:load:fixtures
```

configurer la Bdd dans le .env ou .env.local
```
DATABASE_URL= "mysql://<db_user>:<db_password>@127.0.0.1:5432/<db_name>"

DATABASE_URL="mysql://root:@127.0.0.1:3306/demo"
```

création de la BDD
```bash
php bin/console doctrine:database:create
```

lancer le serveur Symfony
```bash
symfony serve
ou
symfony server:start
```

## Symfony composant

### Controller

```php
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NameController extends AbstracController
{
    /**
     * @Route("/", name="hello")
     */
    public function FunctionName()
    {
        return new Response('hello world');
    }
}
```

### theme bootstrap

```yaml
# config\packages\twig.yaml
twig:
#   [...]
    form_themes: ['bootstrap_4_layout.html.twig']
```