<?php

namespace Keha\Mvc\Model;

class Notes {
    private ?int $id = null;
    private ?float $note = null;

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
     * Get the value of note
     */ 
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set the value of note
     *
     * @return  self
     */ 
    public function setNote($note): static
    {
        $this->note = $note;

        return $this;
    }
}