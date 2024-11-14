<?php
include_once('vendor/autoload.php');

use Keha\Mvc\Controller\IndexController;
use Keha\Mvc\Controller\BonjourController;


/*
* Système de routage basé sur la query string
* Si nous avons une clé controller dans la query string alors on vérifie sa 
* valeur pour instancier le bon contrôleur
*/
if (isset($_GET['controller'])) {
    if($_GET['controller'] === 'index') {
        $controller = new IndexController();
    }
    if($_GET['controller'] === 'bonjour') {
        $controller = new BonjourController();
    }
} else {
    $controller = new IndexController();
}

?>
<nav>
    <a href='index.php?controller=index'>Accueil</a>
    <a href='index.php?controller=bonjour'>Bonjour</a>
</nav>

<?php
/*
* Sur le contrôleur instancier précédemment
* on appelle la méthode index
*/
$controller->index();