<?php
session_start();
if (isset($_REQUEST['logout'])) {
    $_SESSION["id"] = -1;
    $_SESSION["username"] = "";
}

if (isset($_REQUEST['edit'])) {
    $_SESSION["id"] = -1;
    $_SESSION["username"] = "";
}
include_once "database.php";

function getName($id) {
    $db = connectDB();
    $sql = "SELECT nazov FROM vaiiko.images where id_filmu = $id";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    echo $row["nazov"];
    disconnectDB($db);
}
?>

<!DOCTYPE html>
<html lang="sk">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/Navbar.css">
    <link rel="stylesheet" href="CSS/Background.css">
    <link rel="stylesheet" href="CSS/Card.css">
    <link rel="stylesheet" href="CSS/scrollButton.css">
    <link rel="stylesheet" href="CSS/BuyTickets.css">
    <link rel="stylesheet" href="CSS/NavbarDays.css">
    <link rel="stylesheet" href="CSS/Footer-Dark.css">


    <title>HOME</title>
</head>

<body>
<h1>KINOPRO</h1>
<div id="left"></div>
<div id="right"></div>

<?php
include "Navbar.php";
show_navbar(1);
?>

<?php
include "NavbarDays.php"
?>



<div class="cards">
    <div class="container">
        <div class="card1" style=' background-image: url("Images/<?php getName(0);?>"); '>
            <div class="overlay">
                <div class="text">
                    <?php
                    include_once "Cards.php";
                    show_edit(0);
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card2" style=' background-image: url("Images/<?php getName(1);?>"); '>
            <div class="overlay">
                <div class="text">
                    <?php
                    include_once "Cards.php";
                    show_edit(1);
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card3" style=' background-image: url("Images/<?php getName(2);?>"); '>
            <div class="overlay">
                <div class="text">
                    <?php
                    include_once "Cards.php";
                    show_edit(2);
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card4" style=' background-image: url("Images/<?php getName(3);?>"); '>
            <div class="overlay">
                <div class="text">
                    <?php
                    include_once "Cards.php";
                    show_edit(3);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include "scrollButton.php"
?>

<?php
include "Footer.php"
?>


<script src="Assets/js/scrollFunction.js"></script>
<script src="Assets/js/Example.js"></script>
<script src="Assets/js/Example2.js"></script>
<script src="Assets/js/displayFunction.js"></script>
<script> function alertDelete() { alert("Vymazali ste dáta!")}</script>





</body>
</html>



