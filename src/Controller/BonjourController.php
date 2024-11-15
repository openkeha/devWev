<?php

namespace Keha\Mvc\Controller;

use Keha\Kernel\AbstractController;

class BonjourController extends AbstractController {

    public function index()
    {
        //echo 'j\'appelle la méthode render de l\'AbstractContrôleur';
        $this->render('/Pages/bonjour.php',[
            'bonjour'=>'bonjour',
            'texte' => 'Vous commencez à comprendre que le développement est difficile!!!!'
        ]);
    }
}