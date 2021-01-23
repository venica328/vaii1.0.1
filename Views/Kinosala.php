<?php
$_SERVER["SERVER_NAME"]="localhost";
session_start();

include_once "../database.php";
include_once "../Models/Film.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include "Components/Head.php"; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../CSS/Sedacky.css">
    <link rel="stylesheet" href="../CSS/modal.css">

    <title>KINOSÁLA</title>
</head>

<body>
<h1>KINOPRO</h1>
<div id="left"></div>
<div id="right"></div>

<?php
include "Components/Navbar.php";
show_navbar();
include "Components/NavbarDays.php";
include "Components/Sedenie.php";
include "Components/scrollButton.php";
include "Components/Footer.php";
?>

<?php
function getInfo($id) {
    $db = connectDB();

    $dbInfos = $db->query('SELECT * FROM vaiiko.filmy');

    foreach ($dbInfos as $info) {
        if($info['id_filmu'] == $id) {
            $infos[] = new Film($info['id_filmu'],$info['info'], $info['obsah'], $info['obrazok']);
        }
    }

    disconnectDB($db);
    if(empty($infos)) {
        $infos[] = new Film('','','','');
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
            <h2>nazov: <?php echo $info->getInfo() ?></h2>
        </div>
        <div class="modal-body">
            <p>Objednávate si stoličku s číslom: </p>
            <div id="stolicka"></div>
        </div>
        <div class="modal-footer">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); echo'?id_filmu='.$_GET["id_filmu"] ?>">
                <input type="hidden" name="id_filmu" value="<?php echo ($_GET["id_filmu"]); ?>">
                <input type="hidden" id="id_sedadla" name="id_sedadla">
                <button class="submitButton" type="submit"
                        style="background-color: lightseagreen; display: block; width: 40%; margin: auto; text-align: center;">POTVRDIŤ!</button>
            </form>
        </div>
    </div>

</div>




<script src="../Assets/js/scrollFunction.js"></script>
<script src="../Assets/js/Example.js"></script>
<script src="../Assets/js/Example2.js"></script>
<script src="../Assets/js/displayFunction.js"></script>
<script src="../Assets/js/kinosala.js"></script>
<script> var stolicky=<?php echo getStolicka($_GET['id_filmu']); ?>;</script>

</body>
</html>



