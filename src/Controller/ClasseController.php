<?php

namespace Keha\Mvc\Controller;

use Keha\Kernel\AbstractController;
use \Keha\Kernel\Repository;
use Keha\Kernel\Security;

class ClasseController extends AbstractController {

    public function index()
    {
        $security = new Security();
        if (!$security->isConnected()) {
            $this->redirect('index.php?controller=connect');
        }
        $repository = new Repository('classe');
        $classeToUpdate = $repository->getById(2);
        $classeToUpdate->setName("<main>
    <form method='post' action=''>
        <input type='text' name='username' value=''>
        <input type='password' name='password' value=''>
        <input type='submit' name='submit' value='se connecter'>
    </form>
</main>");
        $repository->update($classeToUpdate);

        $classe = $repository->getById(2);
        echo $classe->getName();

    }
}