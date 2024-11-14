<?php

namespace Keha\Kernel;
/*
* Classe responsable de gérer les routes
*
*/
class Router {

    /*
    * Méthode qui permet d'instancier le bon contrôleur
    * en fonction de la query string
    */
    public function dispatch() {
        $controllerName = $_ENV['controller'].'indexcontroller';
        $controller = new $controllerName;

        if (isset($_GET['controller']) && class_exists($_ENV['controller'].$_GET['controller'].'controller')) {
            $controllerName = $_ENV['controller'].$_GET['controller'].'controller';
            $controller = new $controllerName();
        } 
        $controller->index();
    }
}