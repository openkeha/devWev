
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
        


