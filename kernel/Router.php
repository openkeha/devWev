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
        /*echo 'Je suis dans le routeur du framework<br>';
        *echo 'je cherche le bon contrôleur en fonction de la valeur de controller dans la quey string<br>';
        *echo 'Si la clé controller nèxiste pas dans la query string , je définis un cont^roleur par défaut<br>';
        *echo 'dans tous les cas, j\'instancie le contrôleur<br>';
        *echo 'Puis, jàppelle la méthode index du contrôleur instancié<br>';
        */
        
        $controllerName = $_ENV['controller'].'indexcontroller';
        $controller = new $controllerName;

        if (isset($_GET['controller']) && class_exists($_ENV['controller'].$_GET['controller'].'controller')) {
            $controllerName = $_ENV['controller'].$_GET['controller'].'controller';
            $controller = new $controllerName();
        } 
        $controller->index();
    }
}