<?php
function login() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $storage = new DBPouzivatelia();
        if($storage->Login($_POST["username"], $_POST["password"])) {
            header('Location: ../index.php');
            exit;
        } else {
            $message = "Zadali ste nesprávne meno alebo heslo!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
}

?>