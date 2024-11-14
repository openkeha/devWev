<?php

namespace Keha\Mvc\Controller;
use Keha\Mvc\View\BonjourVue;

class BonjourController {

    public function index()
    {
        //Un contrôleur n'est pas obligé d'adresser un modèle
        // Il envoie une vue avec une variable hard codéee
        $view = new BonjourVue();
        $view->render(['bonjour']);
    }
}