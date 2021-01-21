<?php

function show_navbar($id) {
    if (!isset($_SESSION["id"]) || $_SESSION["id"] == -1) {
echo '<nav class ="navbar">
<div class="navbar" id="myNavbar">
    <a href="index.php" class="active">PROGRAM</a>
    <a href="Vstupenky.php">VSTUPENKY</a>
    
    <div class="dropdown">
    
        <button class="dropButton">FILMY <i class="fa fa-caret-down"></i></button>
        <div class="dropdown-content">
            <a href="index.php">Hráme</a>
            <a href="Komentare.php">Komentáre</a>
        </div>
        
    </div>
    <a href="Views/Login.php">LOGIN</a>
    
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>
</nav>';} else {
        echo '<nav class ="navbar">
<div class="navbar" id="myNavbar">
    <a href="index.php" class="active">PROGRAM</a>
    <a href="Vstupenky.php">VSTUPENKY</a>
    
    <div class="dropdown">
    
        <button class="dropButton">FILMY <i class="fa fa-caret-down"></i></button>
        <div class="dropdown-content">
            <a href="index.php">Hráme</a>
            <a href="Komentare.php">Komentáre</a>
        </div>
        
    </div>
    <a href="index.php?logout">Log out</a>
    
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>

</nav>';
    }

}

?>
