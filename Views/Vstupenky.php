<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include "Components/Head.php";?>
    <link rel="stylesheet" href="../CSS/Vstupenky.css">

    <title>VSTUPENKY</title>

</head>

<body>

<h1>KINOPRO</h1>
<div id="left"></div>
<div id="right"></div>

<?php
include "Components/Navbar.php";
show_navbar();
include "Components/NavbarDays.php"
?>

<?php

echo '
    <div class="container">
        <div class="child">
            <div class="listky">
                <h2>Cenník vstupného</h2>
                <p>FILMY 2D</p>
                <ul>
                    <li class="text-align">Dospelí.......... 5€</li>
                    <li class="text-align">Deti, dôchodcovia, ZŤP, študenti(ISIC).......... 3€</li>
                </ul>
                <p>FILMY 3D</p>
                <ul>
                    <li class="text-align">Dospelí.......... 6€</li>
                    <li class="text-align">Deti, dôchodcovia, ZŤP, študenti(ISIC).......... 4€</li>
                </ul>
                    
                <p>K 3D filmom je nutné si kúpiť 3D okuliare za 1€. Okuliare zostávajú vo vlastníctve zákazníka a je ich možné použiť opakovane.</p>
            
            </div>
        </div>
    </div>
'
?>

<?php
include "Components/scrollButton.php";
include "Components/Footer.php";
?>


<script src="../Assets/js/scrollFunction.js"></script>
<script src="../Assets/js/Example.js"></script>
<script src="../Assets/js/Example2.js"></script>




</body>
</html>




