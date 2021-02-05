<?php

function show_navbar()
{
    if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 1) {
        echo '<nav class ="navbar">
<div class="navbar" id="myNavbar">
    <a href="/index.php" class="active">PROGRAM</a>
    <a href="../../Views/Vstupenky.php">VSTUPENKY</a>
    <a href="../../Views/Komentare.php">Komentáre</a>
    <a href="../../Views/Edit.php">Pridať film!</a>
    <a href="/index.php?logout">Log out</a>
    
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>

</nav>';
    } elseif (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 0) {
        echo '<nav class ="navbar">
<div class="navbar" id="myNavbar">
    <a href="/index.php" class="active">PROGRAM</a>
    <a href="../../Views/Vstupenky.php">VSTUPENKY</a>
    <a href="../../Views/Komentare.php">Komentáre</a>
    <a href="/index.php?logout">Log out</a>
    
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>

</nav>';
    } else {
        echo '<nav class ="navbar">
<div class="navbar" id="myNavbar">
    <a href="/index.php" class="active">PROGRAM</a>
    <a href="../../Views/Vstupenky.php">VSTUPENKY</a>
    <a href="../../Views/Komentare.php">Komentáre</a>
    <a href="../../Views/Login.php">LOGIN</a>
    
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>
</nav>';
    }

}

?>
