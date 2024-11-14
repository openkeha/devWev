<?php

namespace Keha\Mvc\Controller;

use Keha\Kernel\AbstractController;

class BonjourController extends AbstractController {

    public function index()
    {
        echo 'j\'appelle la méthode render de l\'AbstractContrôleur';
        $this->render('index.php',[
            'var'=>'bonjour'
        ]);
    }
}