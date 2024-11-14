<?php
namespace Keha\Mvc\View;

/*
* expose une méthode render avec un tableau de valeur à afficher
*
*
*/
class BonjourVue {

    public function render(array $values) 
    {
        foreach($values as $value) {
            echo $value.PHP_EOL;
        }
    }
}