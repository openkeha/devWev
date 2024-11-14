<?php

namespace Keha\Mvc\Controller;

use Keha\Kernel\AbstractController;

class BonsoirController extends AbstractController {

    public function index()
    {
        $this->render('index.php',[
            'var'=>'Bonsoir'
        ]);
    }
}