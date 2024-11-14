<?php
include_once('vendor/autoload.php');
include_once('kernel/configuration/Configuration.php');
use Keha\Kernel\Router;

echo 'index.php appelle le router qui se charge d\'instancier le bon contrôleur en fonction de la query string<br>';
$routeur = new Router;
$routeur->dispatch();