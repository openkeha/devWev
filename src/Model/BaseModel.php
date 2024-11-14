<?php

namespace Keha\Mvc\Model;
/*
* simulation d'une base de donnée
* dans la réalité on va récupérer les infos d'une BDD
*/
class BaseModel {
    private array $model;

    public function __construct()
    {
        for($i=0;$i<11;$i++) {
            $this->model[] = rand(0,20);
        }
    }

    public function getModel():array {
        return $this->model;
    }
}