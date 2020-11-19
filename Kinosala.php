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
    <link rel="stylesheet" href="CSS/BuyTickets.css">
    <link rel="stylesheet" href="CSS/NavbarDays.css">
    <link rel="stylesheet" href="CSS/Footer-Dark.css">
    <link rel="stylesheet" href="CSS/Sedacky.css">

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


<script src="Assets/js/scrollFunction.js"></script>
<script src="Assets/js/Example.js"></script>
<script src="Assets/js/Example2.js"></script>
<script src="Assets/js/displayFunction.js"></script>
<script src="Assets/js/kinosala.js"></script>




</body>
</html>



