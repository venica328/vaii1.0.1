<?php

include 'User.php';
include "Words.php";
include 'CSVStorage.php';
include 'DBStorage.php';

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
//$storage = new CSVStorage('data.csv');
$storage = new DBStorage();
$storage->processData();
?>

<div class="container">
<div class="chat-container">
    <?php foreach ($storage->Load() as $user) { ?>
        <div class="message">
            <div class="name"> <?php echo $user->getNick() ?> </div>
            <div style="padding: 1px 0 30px 41px;margin: 30px 5px 5px -37px;"><?php echo DBStorage::words($user->getText()) ?></div>
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
        <input type="submit" class="text-button" name="sent">SEND</input>
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




