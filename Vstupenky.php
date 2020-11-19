<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/Navbar.css">
    <link rel="stylesheet" href="CSS/Background.css">
    <link rel="stylesheet" href="CSS/Card.css">
    <link rel="stylesheet" href="CSS/scrollButton.css">
    <link rel="stylesheet" href="CSS/NavbarDays.css">
    <link rel="stylesheet" href="CSS/Footer-Dark.css">
    <link rel="stylesheet" href="CSS/Vstupenky.css">
    <title>VSTUPENKY</title>
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
include "scrollButton.php"
?>

<?php
include "Footer.php"
?>


<script src="Assets/js/scrollFunction.js"></script>
<script src="Assets/js/Example.js"></script>
<script src="Assets/js/Example2.js"></script>




</body>
</html>




