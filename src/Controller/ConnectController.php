<?php

namespace Keha\Mvc\Controller;

use Keha\Kernel\AbstractController;
use Keha\Kernel\Security;

class ConnectController extends AbstractController {

    public function index() {
        $security = new Security();
        if ($security->isConnected()) {
            $this->redirect('index.php?controller=bonjour');
        }

        if(isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $security = new Security;
            $connect = $security->connect($username, $password);
            if ($connect === true) {
                $this->redirect('index.php?controller=bonjour');
            } else {
                echo $connect;
            }
        }
        $this->render('/pages/connexion.php', []);
    }
}