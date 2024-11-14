<?php

namespace Keha\Mvc\Controller;

use Keha\Mvc\Model\BaseModel;
use Keha\Mvc\View\IndexVue;

class IndexController {

    public function index()
    {
        // Adresse le modèle
        $model = new BaseModel();
        // Récupère les données du modèle
        $datas = $model->getModel();
        // instancie la bonne vue
        $view = new IndexVue();
        // affiche la vue
        $view->render($datas);
    }
}