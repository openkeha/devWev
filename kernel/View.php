<?php

namespace Keha\Kernel;

class View {

    public function render(string $template, array $values) {
        /*echo 'je suis dans l\'objet View du framework<br>';
        *echo 'La méthode render de View est appeléee<br>';
        *echo 'Elle appelle la fonction extract de PHP: voir doc PHP';
        *
        *echo 'je charge le fichier template qui va s\'afficher';
        */
        extract($values);
        include_once('../Templates/Template/head.php');
        include_once('../Templates/Template/header.php');
        include_once('../Templates/'.$template);
        include_once('../Templates/Template/footer.php');        
    }
}