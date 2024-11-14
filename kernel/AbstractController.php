<?php
namespace Keha\Kernel;

use Keha\Kernel\View;

class AbstractController {
    private View $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function render(string $template, array $vars) 
    {
        $this->view->render($template, $vars);
    }
}