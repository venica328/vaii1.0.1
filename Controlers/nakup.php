<?php
include "../DB/DBKinosala.php";

$storageStolicka = new DBKinosala();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['id_sedadla']) && isset ($_POST['id_filmu']) && isset ($_POST['id_pouzivatela'])) {
        $sedacky = new Sedacky('', $_POST["id_sedadla"], $_POST["id_filmu"], $_POST["id_pouzivatela"]);

        $result = $storageStolicka->LoadStolickaPreFilm($_POST["id_filmu"]);
        foreach ($result as $stolicka) {
            if ($stolicka->getIdSedadla() == $_POST["id_sedadla"]) {
                header('Content-Type: application/json');
                echo '{"message":"Stolička je už rezervovaná!"}';
                die;
            }
        }
        $storageStolicka->Save($sedacky);
        header('Content-Type: application/json');
        echo '{"message":"Vaša rezervácia prebehla úspešne! 😀"}';
    } else {
        header('Content-Type: application/json');
        echo '{"message":"Chýbajúce údaje!"}';
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    header('Content-Type: application/json');
    echo json_encode($storageStolicka->LoadStolickaPreFilm($_GET['id_filmu']));
}

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    if(isset($_GET['id_filmu2']) && isset ($_GET['id_sedadla2'])) {
        $storageStolicka->DeleteStolickuPreFilm($_GET['id_filmu2'], $_GET['id_sedadla2']);
        header('Content-Type: application/json');
        echo '{"message":"Vaša rezervácia bola zrušená!"}';
    } else {
        header('Content-Type: application/json');
        echo '{"message":"Chýbajúce údaje!"}';
    }

}
?>
