<?php

include 'Models/Komentar.php';
include 'Controlers/DBKomentare.php';
session_start();
if (isset($_REQUEST['logout'])) {
    $_SESSION["id"] = -1;
    $_SESSION["username"] = "";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "Head.php";
    ?>
    <link rel="stylesheet" href="CSS/Ohlasy.css">

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
<?php

$storage = new DBKomentare();

if(isset($_POST["nick"]) && isset($_POST["text"])) {
    $kom = new Komentar(0,$_POST["nick"], $_POST["text"]);
    $storage->Save($kom);
}

if(isset($_GET["delete"])) {
    $storage->Delete($_GET["delete"]);
}
?>

<div class="container">
<div class="chat-container">
    <?php foreach ($storage->Load() as $komentar) { ?>

        <div class="message">
            <?php if (!(!isset($_SESSION["id"]) || $_SESSION["id"] == -1)) {
                echo '<a href="?delete='.$komentar->getId().'">x</a>';
            }
            ?>

            <div class="name"> <?php echo $komentar->getNick() ?> </div>
            <div style="padding: 1px 0 30px 41px;margin: 30px 5px 5px -37px;"><?php echo $komentar->getText() ?></div>
        </div>
    <?php } ?>
</div>

    <form method="post" class="send-message-form">
        <label>
            <input type="text" name="nick" placeholder="NICK" required>
        </label>
        <label>
            <input type="text" name="text" placeholder="Komentár" required>
        </label>
        <input type="submit" class="text-button" name="sent">
    </form>

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
<script src="Assets/js/ohlasy.js"></script>

</body>
</html>




