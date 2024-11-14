<?php

namespace Keha\Kernel;

use PDOException;

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

    public static function getConnexion() {
        if (self::$connexion === null) {
            new static();
        }
        return self::$connexion;
    }
}