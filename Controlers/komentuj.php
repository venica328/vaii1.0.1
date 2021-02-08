<?php

include "../DB/DBKomentare.php";

$storage_komentar = new DBKomentare();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $komentar = new Komentar(0, $_POST["nick"], $_POST["text"]);
    $storage_komentar->Save($komentar);
}


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    header('Content-Type: application/json');
    echo json_encode($storage_komentar->Load());
}

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    $storage_komentar->Delete($_GET['id']);
}

?>
