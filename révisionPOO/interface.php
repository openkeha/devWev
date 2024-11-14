<?php

interface Paiement {
    public function payer(float $montant):bool;
}

class PayerCb implements Paiement {

    public function payer(float $montant):bool
    {
        echo 'je paye par Cb';
        if ($this->verifCarte()) {
            return true;
        }
        return false;
    }

    private function verifCarte():bool
    {
        echo 'Je vérifie la carte';
        return true;
    }
}

class PayerCheque implements Paiement {

    public function payer(float $montant):bool
    {
        echo 'je paye par chèque';
        return true;
    }
}

class PayerVirement implements Paiement {

    public function payer(float $montant):bool
    {
        echo 'je paye par virement';
        return true;
    }
}

class Payer {
    private Paiement $paiement;

    public function Paiement(float $montant, string $paiement)
    {
        if (class_exists($paiement)) {
            $this->paiement = new $paiement();
            $this->paiement->payer($montant);
        } else {
            echo 'Cettte méthode de paiement n\'existe pas';
        }
        
    }
}

$paiement = new Payer;
$paiement->Paiement(100, 'Toto');
$paiement->Paiement(100, 'PayerVirement');
$paiement->Paiement(100, 'PayerCheque');
