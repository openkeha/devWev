<?php
/*
*
*
*/

class Rectangle {
    private float $largeur;
    private float $longueur;
    private string $type;

    public function __construct($largeur, $longueur)
    {
        $this->largeur = $largeur;
        $this->longueur = $longueur;
        $this->setType();
    }

    public function setLongueur(float $value):static 
    {
        $this->longueur = $value;
        $this->setType();
        return $this;
    }

    public function setLargeur(float$value): static
    {
        $this->largeur = $value;
        $this->setType();
        return $this;
    }

    private function setType()
    {
        if ($this->largeur === $this->longueur)
        {
            $this->type = 'carré';
        } else {
            $this->type = 'rectangle';
        }
    }

    public function calculPerimetre()
    {
        $perimetre = ($this->largeur+$this->longueur)*2;
    }

    public function __toString()
    {
        return 'Je suis un '.$this->type.' avec une largeur de :'.$this->largeur.' et une longueur de : '.$this->longueur;   
    }
}

$rectangle = new Rectangle(10,15);
$rectangle2 = new Rectangle(10,10);
echo $rectangle;
echo PHP_EOL;
echo $rectangle2;
echo PHP_EOL;
$rectangle->setLongueur(10);
echo $rectangle;
echo PHP_EOL;