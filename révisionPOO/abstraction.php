<?php

abstract class Matieres {
    protected string $nom;
    protected array $notes;
    private int $nbNotes;
    private float $noteCumul;
    private float $maxNote;


    protected function __construct()
    {
        $this->notes = [];
        $this->nbNotes = 0;
        $this->noteCumul = 0;
        $this->maxNote = 0;
    }

    public function calculerMoyenne():float
    {
        return $this->noteCumul/$this->nbNotes;
    }

    public function getMaxNote():float
    {
        return $this->maxNote;
    }

    public function addNote(float $note):static
    {
        $this->notes[] = $note;
        $this->nbNotes++;
        $this->noteCumul += $note;
        if ($note > $this->maxNote) {
            $this->maxNote = $note;
        }
        return $this;
    }

}

class Javascript extends Matieres {

    public function __construct()
    {
        $this->nom = 'Javascript';
        parent::__construct();
    }
}

class Php extends Matieres {
    public function __construct()
    {
        $this->nom = 'PHP';
        parent::__construct();
    }
}

class Builder {
    private Matieres $matiere;

    public function __construct(string $classe)
    {
        if (class_exists($classe)) {
            $this->matiere = new $classe();
        }
    }

    public function addNote($note): Matieres
    {
        $this->matiere->addNote($note);
        return $this->matiere;
    }

    public function getMoyenne()
    {
        $this->matiere->calculerMoyenne();
    }

    public function getMaxNote()
    {
        $this->matiere->getMaxNote();
    }
}

$a = new builder('Php');
$a->addNote(10.5)->addNote(11.5)->addNote(20);

echo $a->getMaxNote();
echo PHP_EOL;
echo $a->getMoyenne();