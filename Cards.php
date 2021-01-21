<?php
include "Models/Film.php";
include "Controlers/DBFilmy.php";
?>

<?php

function show_edit($film){

    if (!isset($_SESSION["id"]) || $_SESSION["id"] == -1) {
        echo '
                    <p>' . $film->getInfo() . '</p>
                    <p>' . $film->getObsah() . '</p>         
                ';

        echo '<a class="buyButton" href="Kinosala.php?id_filmu=' . $film->getIdFilmu() . '">NÁKUP</a>';

    } else {
        echo '
                    <p>' . $film->getInfo() . '</p>
                    <p>' . $film->getObsah() . '</p>         
                ';

        if ($film->getInfo() == '' or $film->getObsah() == '') {
            echo '<div class="navbarCards">
                  <div class="dropdown">
                    <button class="dropButton">SPRAVUJ <i class="fa fa-caret-down"></i></button>
                    <div class="dropdown-content">
                        <a style="text-align: right; padding: 2px 30px;" href="Edit.php?id_filmu=' . $film->getIdFilmu()  . '">EDITOVANIE</a>
                        <a style="text-align: right; padding: 2px 30px;" href="Image.php?id_filmu=' . $film->getIdFilmu()  . '">OBRÁZOK</a>
                        <form method="post">
                        </form>
                    </div>
                  </div>
              </div>
                ';
        } else {
            echo '
              <div class="navbarCards">
                  <div class="dropdown">
                    <button class="dropButton">SPRAVUJ <i class="fa fa-caret-down"></i></button>
                    <div class="dropdown-content">
                        <a style="text-align: right; padding: 2px 30px;" href="Edit.php?id_filmu=' . $film->getIdFilmu()  . '">EDITOVANIE</a>
                        <a style="text-align: right; padding: 2px 30px;" href="Image.php?id_filmu=' . $film->getIdFilmu()  . '">OBRÁZOK</a>
                        <form method="post">
                          <a onclick="alertDelete()" style="text-align: right; padding: 2px 30px;" href="index.php?delete=' . $film->getIdFilmu()  . '">DELETE</a>
                        </form>
                    </div>
                  </div>
              </div>
                
              ';
        }
    }
}

?>

