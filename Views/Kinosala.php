<?php
$_SERVER["SERVER_NAME"] = "localhost";
session_start();

include "../DB/DBKinosala.php";
include "../DB/DBFilmy.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include "Components/Head.php"; ?>
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
$storageFilm = new DBFilmy();
?>

<div id="myModal" class="modal">

    <div class="modal-content">

        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Názov: <?php echo $storageFilm->Load($_GET["id_filmu"])->getInfo(); ?></h2>
        </div>
        <div class="modal-body">
            <p>Objednávate si stoličku s číslom: </p>
            <div id="stolicka"></div>
        </div>

        <div class="modal-footer">
            <form method="post" id="form_nakup" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);
            echo '?id_filmu=' . $_GET["id_filmu"] ?>">
                <input type="hidden" name="id_filmu" value="<?php echo($_GET["id_filmu"]); ?>">
                <input type="hidden" id="id_sedadla" name="id_sedadla">
                <input type="hidden" name="id_pouzivatela" value="<?php echo($_SESSION['id']); ?>">
                <button class="submitButton" type="submit"
                        style="background-color: lightseagreen; display: block; width: 40%; margin: auto; text-align: center;">
                    POTVRDIŤ!
                </button>
            </form>
        </div>
    </div>
</div>
<script> var id_pouzivatela =<?php echo $_SESSION['id']; ?>;</script>
<script src="../Assets/js/scrollFunction.js"></script>
<script src="../Assets/js/Example.js"></script>
<script src="../Assets/js/Example2.js"></script>
<script src="../Assets/js/kinosala.js"></script>



</body>
</html>



