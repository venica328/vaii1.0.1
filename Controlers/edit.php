<?php

/**
 * @return Film|mixed
 * Funkcia vráti údaje o danom filme v Edit.php alebo nevráti žiadne dáta pre vytvorenie nového filmu
 */
function inicializacia()
{
    $storage = new DBFilmy();
    if (isset($_GET["id_filmu"]) && $_GET["id_filmu"] != '') {
        $film = $storage->Load($_GET["id_filmu"]);
    } else {
        $film = new Film('', '', '', '');
    }
    return $film;
}

/**
 * Funkcia umožní aktualizovať dáta o vytvorenom filme alebo pridať nový film
 */
function edit()
{
    if (isset($_POST["info"]) && isset($_POST["obsah"])) {
        $storage = new DBFilmy();
        $filename = $_FILES['uploadfile']['name'];
        $filetmpname = $_FILES['uploadfile']['tmp_name'];
        $folder = '/Images';
        move_uploaded_file($filetmpname, $folder . $filename);

        if (isset($_GET["id_filmu"]) && $_GET["id_filmu"] != '') {
            $nove = new Film($_GET["id_filmu"], $_POST["info"], $_POST["obsah"], $filename);
            $storage->Update($nove);

        } else {
            $nove = new Film(0, $_POST["info"], $_POST["obsah"], $filename);
            $storage->Save($nove);

        }
    }
}

?>
