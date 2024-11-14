<?php

namespace Keha\Mvc\Model;

class Classe {
    private ?int $id = null;
    private ?string $name = null;
    private ?float $coef = null;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id): static
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of coef
     */ 
    public function getCoef()
    {
        return $this->coef;
    }

    /**
     * Set the value of coef
     *
     * @return  self
     */ 
    public function setCoef($coef):static
    {
        $this->coef = $coef;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }
}