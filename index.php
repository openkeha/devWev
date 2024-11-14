<?php
include_once('vendor/autoload.php');
include_once('kernel/configuration/RouteConfiguration.php');
use Keha\Kernel\Router;

$routeur = new Router;
$routeur->dispatch();