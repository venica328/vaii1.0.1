
<?php

/**
 * Funkcia umožní registrovať nového používateľa a ošetruje pridané dáta na strane servera
 * Ošetruje sa to v DBPouzivatelia
 */
function register() {
    if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["password_again"])) {
        $storage = new DBPouzivatelia();
        $ret = $storage->Register($_POST["username"], $_POST["password"], $_POST["password_again"]);
        if($ret == 0) {
            $message = "Zadali ste nesprávne meno alebo heslo!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('Location: Login.php');
            exit;
        } elseif ($ret == -1) {
            $message = "Používateľské meno už existuje!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } elseif ($ret == -2) {
            $message = "Heslá sa nezhodujú!/Nemajú dĺžku 8 znakov!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }else {
            $message = "Neznáma chyba!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
}


?>