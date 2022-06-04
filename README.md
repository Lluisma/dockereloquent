
# NGINX + PHP + MYSQL + Eloquent ORM Docker setup

- - - 

### PHP customization

  * `pdo + pdo_mysql + mysqli` extensions
  * `zip + unzip`
  * `git`
  * `composer`
  * `illuminate/database` (Eloquent ORM Standalone)
  * `vlucas/phpdotenv` (Loads environment variables from .env)
  * `symfony/var-dumper` (Symfony VarDumper component, for development environment)

- - - 

### Project Tree

    project
    ├─ _data
    │  └─ _db                         // Folder for persistent MySQL data volume
    ├─ _nginx
    │  └─ site.conf                   // Nginx configuration file
    ├─ _php
    │  └─ Dockerfile                  // Commands to assemble the PHP image
    ├─ _www
    │  ├─ _app
    │  │  ├─ _Models                  // Folder for custom Eloquent models
    │  │  └─ bootstrap.php            // Capsule connection configuration and Eloquent start up
    │  ├─ _public
    │  │   └─ index.php
    │  ├─ _vendor
    │  ├─ composer.json               // Eloquent/VarDumper packages and /app classes PSR-4 autoloading
    ├─ .env                           // Environmental variables (database credentials)
    └─ docker-compose.yml

- - - 

## Instructions

1. Checkout the repository
2. Edit `.env` file variables (database credentials)
3. Edit `docker-compose-yml` if you want to define each container name (`container_name: YOUR_NAME`)
4. Run on terminal
~~~
  $ docker-compose up -d
  $ docker exec -u 0 -it <your_php_container_name> /bin/sh
    # composer update                 // Install packages and add classes folder as autoload
    # exit
~~~
5. Navigate to `localhost:8080` in your browser

- - - 

## Example

The `index.php` page is an example of using *Eloquent ORM* models, showing a list of the contents of `CHARACTER_SETS` table from `information_schema` database (as defined in the `bootstrap.php` file).

You can fina the `CharacterSet` model declared by default in `www/app/Models/` folder, referring to this table.

Place your new models in same folder.

- - -

### Initial database load (optional)

~~~
  $ cd data                           // Place your backup.sql file in this folder to load
  $ docker exec -u 0 -it <your_mysql_container_name> /bin/sh
    # mysql -p -u <user_name> <database_name> < <backup_file>
~~~

- - -

> ### DON'T FORGET !!

> Add `require "../app/bootstrap.php";` in those pages you want to use *Eloquent ORM* functions
