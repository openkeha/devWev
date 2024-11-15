<?php

namespace Keha\Mvc\Controller;

use Keha\Kernel\AbstractController;
use Keha\Kernel\Security;

class ConnectController extends AbstractController {

    public function index() {
        if(isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $security = new Security;
            $connect = $security->connect($username, $password);
            if ($connect === true) {
                echo 'Bien connecté';
            } else {
                echo $connect;
            }
        }
        $this->render('/pages/connexion.php', []);
    }
}