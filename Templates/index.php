<!DOCTYPE html>
<html>
    <head>
        <title>Le titre</title>
        <meta charset="UTF-8">
        </head>
    <body>
        <nav>
            <a href='index.php?controller=index'>Accueil</a>
            <a href='index.php?controller=bonjour'>Bonjour</a>
            <a href='index.php?controller=bonsoir'>Bonsoir</a>
        </nav>
        <main>
            <?php
                if (is_array($var)) {
                    foreach($var as $value) {
                        echo $value;
                    }
                } else {
                    echo $var;
                }
            

            ?>
        </main>
        <footer>

        </footer>
    </body>
</html>
<?php


