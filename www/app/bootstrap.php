<?php

    require "../vendor/autoload.php";

    use Illuminate\Database\Capsule\Manager as Capsule;

    $capsule = new Capsule;


    $dotenv = Dotenv\Dotenv::createImmutable('../');
    $dotenv->load();

    
    $capsule->addConnection([
      "driver"   => "mysql",
      "host"     => "mysql",
      "database" => $_ENV['MYSQL_DATABASE'],
      "username" => $_ENV['MYSQL_USER'],
      "password" => $_ENV['MYSQL_PASSWORD']
      //'charset'   => 'utf8',
      //'collation' => 'utf8_unicode_ci',
      //'prefix'    => '',
    ]);

    $capsule->setAsGlobal();

    $capsule->bootEloquent();
