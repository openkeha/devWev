<?php

namespace Keha\Mvc\Controller;

use Keha\Kernel\AbstractController;

class BonjourController extends AbstractController {

    public function index()
    {
        $this->render('index.php',[
            'var'=>'bonjour'
        ]);
    }
}