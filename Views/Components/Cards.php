<?php

include "Controlers/DBFilmy.php";


if(isset($_GET["delete"])) {
    $storage = new DBFilmy();
    $storage->Delete($_GET["delete"]);
}

function show_edit($film)
{

    if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 1) {

        echo '
                    <p>' . $film->getInfo() . '</p>
                    <p>' . $film->getObsah() . '</p>         
                ';
            echo '
              <div class="navbarCards">
                  <div class="dropdown">
                    <button class="dropButton">SPRAVUJ <i class="fa fa-caret-down"></i></button>
                    <div class="dropdown-content">
                        <a style="text-align: right; padding: 2px 30px;" href="Views/Edit.php?id_filmu=' . $film->getIdFilmu() . '">EDITOVANIE</a>
                        <form method="post">
                          <a onclick="alertDelete()" style="text-align: right; padding: 2px 30px;" href="../index.php?delete=' . $film->getIdFilmu() . '">DELETE</a>
                        </form>
                    </div>
                  </div>
              </div>
                
              ';

    } elseif (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 0) {
        echo '
                    <p>' . $film->getInfo() . '</p>
                    <p>' . $film->getObsah() . '</p>         
                ';

        echo '<a class="buyButton" href="Views/Kinosala.php?id_filmu=' . $film->getIdFilmu() . '">NÁKUP</a>';

    } else {
        echo '
                    <p>' . $film->getInfo() . '</p>
                    <p>' . $film->getObsah() . '</p>         
                ';
    }
}

?>

