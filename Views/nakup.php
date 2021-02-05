<?php
include "../Controlers/DBKinosala.php";

$storageStolicka = new DBKinosala();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sedacky = new Sedacky('', $_POST["id_sedadla"], $_POST["id_filmu"], $_POST["id_pouzivatela"]);
    $storageStolicka->Save($sedacky);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    header('Content-Type: application/json');
    echo json_encode($storageStolicka->LoadStolickaPreFilm($_GET['id_filmu']));
}
?>
