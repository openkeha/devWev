<?php

namespace Keha\Mvc\Controller;

use Keha\Kernel\AbstractController;
use \Keha\Kernel\Repository;
use Keha\Mvc\Model\Classe;
use Keha\Mvc\Model\Notes;

class ClasseController extends AbstractController {

    public function index()
    {
        $repository = new Repository('notes');
        echo '<pre>';
        var_dump($repository->getAll());
        echo '</pre>';

        $note = new Notes();
        $note->setNote(18);
        $repository->insert($note);

        $repository = new Repository('classe');
        echo '<pre>';
        var_dump($repository->getAll());
        echo '</pre>';

        $class = new Classe();
        $class->setName('Trop compliqué la programmation');
        $repository->insert($class);

    }
}