<?php
include_once "Informacia.php";
include_once "database.php";
?>

<?php
$info = " ";
$obsah =" ";


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["delete"])) {
        $id = $_GET["delete"];
        $db = connectDB();
       $sql = "UPDATE vaiiko.table SET info = NULL, obsah = NULL where id_filmu=$id";
        // $sql = "DELETE FROM vaiiko.table where id_filmu=$id";
        $db->query($sql);
        disconnectDB($db);
    }
}

function getInfo($id) {
    $db = connectDB();

    $dbInfos = $db->query('SELECT * FROM vaiiko.`table`');

    foreach ($dbInfos as $info) {
        if($info['id_filmu'] == $id) {
            $infos[] = new Informacia($info['info'], $info['obsah']);
        }
    }

    disconnectDB($db);
    if(empty($infos)) {
        $infos[] = new Informacia('','');
    }

    return $infos[0];

}

function show_edit($id)

{
    $info=getInfo($id);

    if (!isset($_SESSION["id"]) || $_SESSION["id"] == -1) {
                echo '
                    <p>' . $info->getInfo() . '</p>
                    <p>' . $info->getObsah() . '</p>         
                ';

        echo '<a class="buyButton" href="Kinosala.php?id_filmu='. $id .'">NÁKUP</a>';

    } else {
        echo '
                    <p>' . $info->getInfo() . '</p>
                    <p>' . $info->getObsah() . '</p>         
                ';

        if($info->getInfo() == '' or $info->getObsah() == '') {
            echo '<a class="buyButton" href="Edit.php?id_filmu='. $id .'">PRIDANIE</a>
                  <a class="buyButton" style="bottom: 350%" href="Image.php?id_filmu='. $id .'">ZMENA OBRAZKA</a>
                ';
        } else {
            echo '<a class="buyButton" href="Edit.php?id_filmu='. $id .'">EDITOVANIE</a>
              <form method="post">
              <a class="editButton" style="bottom: -80px;" type="button" href="index.php?delete='. $id .'">DELETE</a>
              
              </form>';
        }

    }

}
?>

