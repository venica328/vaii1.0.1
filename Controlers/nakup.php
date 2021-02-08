<?php
include "../DB/DBKinosala.php";

$storageStolicka = new DBKinosala();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sedacky = new Sedacky('', $_POST["id_sedadla"], $_POST["id_filmu"], $_POST["id_pouzivatela"]);

    $result = $storageStolicka->LoadStolickaPreFilm($_POST["id_filmu"]);
    foreach ($result as $stolicka) {
        if($stolicka->getIdSedadla() == $_POST["id_sedadla"]) {
            header('Content-Type: application/json');
            echo '{"message":"Stolička je už rezervovaná!"}';
            die;
        }
    }
    $storageStolicka->Save($sedacky);
    header('Content-Type: application/json');
    echo '{"message":"Vaša rezervácia prebehla úspešne! 😀"}';
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    header('Content-Type: application/json');
    echo json_encode($storageStolicka->LoadStolickaPreFilm($_GET['id_filmu']));
}
?>
