<?php

namespace Keha\Kernel;

class Security
{
    public function isConnected():bool
    {
        if (isset($_SESSION['connected']) && $_SESSION['connected']===true) {
            return true;
        }

        return false;
    }

    public function connect($username, $password):mixed 
    {
        $repository = new Repository('user');
        $result = $repository->getByAttribute('username', $username);
        if (!$result) {
            return 'identifiant ou mot de passe invalide';
        }
        if (password_verify($password, $result[0]->getPassword())) {
            $_SESSION['connected'] = true;
            return true;
        } else {
            return 'identifiant ou mot de passe invalide';
        }
    }
}