<?php
session_start();
if (isset($_REQUEST['logout'])) {
    $_SESSION["id"] = -1;
    $_SESSION["isAdmin"] = -1;
    $_SESSION["username"] = "";
}

include "Views/Components/Cards.php";

?>

<!DOCTYPE html>
<html lang="sk">

<head>

    <?php include "Views/Components/Head.php"; ?>
    <title>HOME</title>

</head>

<body>

<?php include "Views/Components/Body.php";?>

<div class="cards">

    <?php
    $storage = new DBFilmy();

    foreach ($storage->LoadAll() as $film) { ?>
        <div class="container">
            <div class="card1" style=' background-image: url("Images/<?php echo $film->getObrazok(); ?>"); '>
                <div class="overlay">
                    <div class="text">
                        <?php
                        show_card($film);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php include "Views/Components/Footer.php"; ?>

<script src="Assets/js/scrollFunction.js"></script>
<script src="Assets/js/Example.js"></script>
<script src="Assets/js/Example2.js"></script>
<script src="Assets/js/alerts.js"></script>

</body>
</html>



