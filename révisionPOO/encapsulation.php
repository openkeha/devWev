<?php

class Voiture {
    public string $marque;
    private string $motorisation;



    /**
     * Get the value of motorisation
     */ 
    public function getMotorisation(): string
    {
        return $this->motorisation;
    }

    /**
     * Set the value of motorisation
     *
     * @return  self
     */ 
    public function setMotorisation(string $motorisation): self
    {
        $this->motorisation = $motorisation;

        return $this;
    }
}

$voitureA = new Voiture();
$voitureB = new Voiture();
$voitureA->marque = 'Peugeot';
$voitureA->setMotorisation('Essence');

var_dump($voitureA);
var_dump($voitureB);
