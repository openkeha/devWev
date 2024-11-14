<?php

namespace Keha\Mvc\Controller;

use Keha\Kernel\AbstractController;
use Keha\Mvc\Model\BaseModel;

class IndexController extends AbstractController {

    public function index()
    {
        // Adresse le modèle
        $model = new BaseModel();
        // Récupère les données du modèle
        $datas = $model->getModel();
        // affiche la vue
        $this->render('/Pages/index.php',[
            'values'=>$datas
        ]);
    }
}