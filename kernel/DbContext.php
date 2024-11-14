<?php

namespace Keha\Kernel;

use PDOException;
/*
* La classe a la responsabilité de se connecter à une BDD
* Les informations de connexion sont dans la configuration(i.e: $_ENV)
* Utilise le design pattern singleton pour renvoyer
* toujours la même instance (donc la même connection à l'utilisateur)
* Pour recupérer une connection, il faut passer par la méthode getConnexion
*/
class DbContext {
    private static ?\PDO $connexion = null;

    private function __construct()
    {
        try {
            self::$connexion = new \PDO($_ENV['dsn'], $_ENV['dbUsername'], $_ENV['dbPassword']);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        
    }

    /*
    * méthode statique hors contexte objet 
    * vérifie que la propriété est null
    * si elle est null, elle instanie la classe pour créer une connexion PDO
    * enfin, elle renvoie la propriété statique connexion qui est un objet PDO
    */
    public static function getConnexion() {
        if (self::$connexion === null) {
            new static();
        }
        return self::$connexion;
    }
}