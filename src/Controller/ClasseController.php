<?php

namespace Keha\Mvc\Controller;

use Keha\Kernel\AbstractController;
use \Keha\Kernel\Repository;
use Keha\Mvc\Model\Classe;

class ClasseController extends AbstractController {

    public function index()
    {
        $repository = new Repository('notes');
        echo '<pre>';
        var_dump($repository->getAll());
        echo '</pre>';

        $repository = new Repository('classe');
        echo '<pre>';
        var_dump($repository->getAll());
        echo '</pre>';

        $class = new Classe();
        $class->setName('Modélisation');
        $repository->insert($class);

    }
}