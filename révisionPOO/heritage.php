<?php

class Mere {
    private string $propA;
    private string $propB;

    public function __construct(string $a, string $b)
    {
        $this->propA = $a;
        $this->propB = $b;
    }

    public function seDeplacer(): void
    {
        echo 'je me déplace depuis la classe mère'.PHP_EOL;
    }

    public function jeStoppe():void
    {
        echo 'je stoppe dans la classe mère'.PHP_EOL;
    }
}

class Enfant extends Mere {
    private string $propC;
    
    public function __construct(string $a, string $b, string $c)
    {
        $this->propC = $c;
        parent::__construct($a, $b);
    }

    public function seDeplacer(): void
    {
        echo 'je me déplace dans la classe enfant'.PHP_EOL;
    }

}

$enfant = new Enfant('toto', 'tutu','enfant');

var_dump($enfant);
$enfant->seDeplacer();
$enfant->jeStoppe();

$mere = new Mere('tata', 'tete');
$mere->seDeplacer();

