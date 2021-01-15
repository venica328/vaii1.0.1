<?php
$_SERVER["SERVER_NAME"]="localhost";
session_start();

include_once "database.php";
include_once "Informacia.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/Navbar.css">
    <link rel="stylesheet" href="CSS/Background.css">
    <link rel="stylesheet" href="CSS/Card.css">
    <link rel="stylesheet" href="CSS/scrollButton.css">
    <link rel="stylesheet" href="CSS/BuyTickets.css">
    <link rel="stylesheet" href="CSS/NavbarDays.css">
    <link rel="stylesheet" href="CSS/Footer-Dark.css">
    <link rel="stylesheet" href="CSS/Sedacky.css">
    <link rel="stylesheet" href="CSS/modal.css">

    <title>KINOSÁLA</title>
</head>
<h1>KINOPRO</h1>
<body>

<div id="left"></div>
<div id="right"></div>

<?php
include "Navbar.php";
show_navbar(1);
?>

<?php
include "NavbarDays.php"
?>

<?php
include "Sedenie.php"
?>

<?php
include "scrollButton.php"
?>

<?php
include "Footer.php"
?>

<?php
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

function getStolicka($id) {
    $db = connectDB();

    $dbInfos = $db->query('SELECT id_sedadla FROM vaiiko.`kinosala` where id_filmu='.$id.'');
    foreach ($dbInfos as $info) {
        $infos[] = $info["id_sedadla"];

    }
    disconnectDB($db);
    $stolicky=json_encode($infos);
    return $stolicky;
}

$info=getInfo($_GET['id_filmu']);

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = connectDB();
    $id_sedadla = test_input($_POST["id_sedadla"]);
    $id_filmu = test_input($_POST["id_filmu"]);
    $sql = 'INSERT INTO vaiiko.kinosala (id_filmu,id_sedadla) VALUES ('.$id_filmu.', '.$id_sedadla.')';
    $db->query($sql);
    disconnectDB($db);
}


?>


<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">

        <div class="modal-header">
            <span class="close">&times;</span>
            <h2><?php echo $info->getInfo() ?></h2>
        </div>
        <div class="modal-body">
            <p>Objednavate si stolicku s cislo: </p>
            <div id="stolicka"></div>
        </div>
        <div class="modal-footer">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); echo'?id_filmu='.$_GET["id_filmu"] ?>">
                <input type="hidden" name="id_filmu" value="<?php echo ($_GET["id_filmu"]); ?>">
                <input type="hidden" id="id_sedadla" name="id_sedadla">
                <button class="btn btn-primary btn-block" type="submit"
                        style="background-color: lightseagreen; display: block; width: 40%; margin: auto; text-align: center;">POTVRDIT!</button>
            </form>
        </div>
    </div>

</div>




<script src="Assets/js/scrollFunction.js"></script>
<script src="Assets/js/Example.js"></script>
<script src="Assets/js/Example2.js"></script>
<script src="Assets/js/displayFunction.js"></script>
<script src="Assets/js/kinosala.js"></script>
<script> var stolicky=<?php echo getStolicka($_GET['id_filmu']); ?>;</script>

</body>
</html>



