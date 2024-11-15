<?php
namespace Keha\Kernel;

use Keha\Kernel\View;

class AbstractController {
    private View $view;

    public function __construct()
    {
        //echo 'A l\instanciation d\'un contrôleur qui étend AbstractController, j\'instancie un ovjet de type Vue<br>';
        $this->view = new View();
    }

    public function render(string $template, array $vars) 
    {
        //echo 'la fonction render d\'AbstractControler permet de cacher la logique de la vue au développeur<br>';
        $this->view->render($template, $vars);
    }
}