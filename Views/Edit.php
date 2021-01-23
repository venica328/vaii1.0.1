<?php
if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 1) {
    session_start();
}

include "Components/Cards.php";
include "../Controlers/DBFilmy.php";
include "../Models/Film.php";
?>

<!DOCTYPE html>
<html lang="sk">
<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Editovanie</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="../CSS/Edit.css">

</head>
<body>

<?php
$storage = new DBFilmy();
$film = $storage->Load($_GET["id_filmu"]);
if(isset($_GET["submit"])) {
    $nove = new Film($_GET["id_filmu"],$_POST["info"], $_POST["obsah"], $film->getObrazok());
    $storage->Update($nove);

}

?>

<div class="register-photo" style="background: purple;">
    <div class="form-container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);
        echo '?id_filmu=' . $_GET["id_filmu"] ?>">
            <div class="form-group"><input class="form-control"
                                           style="height: 50px; background: #e7e3e8;"
                                           type="text" name="info" placeholder="Názov filmu"
                                           value="<?php echo $film->getInfo() ?>">
            </div>

            <div class="form-group"><textarea class="form-control"
                                              style="padding: 5% 0% 30% 2%; background: #e7e3e8;" type="text"
                                              name="obsah"
                                              placeholder="Obsah filmu">Obsah filmu: <?php echo $film->getObsah() ?>  </textarea>
            </div>

            <div class="form-group"><input class="form-control"
                                           style="padding: 5% 0% 30% 2%; background: #e7e3e8;"
                                           type="hidden" name="id_filmu" value="<?php echo($_GET["id_filmu"]); ?>">
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-block" onclick="alertAdd()" type="submit" name="submit"
                        style="background-color: lightseagreen; display: block; width: 40%; margin: auto; text-align: center;">
                    UPLOAD!
                </button>
            </div>

            <a href="../index.php">HOME</a>
        </form>
    </div>

</div>


<script src="../Assets/js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.edit.js"></script>
<script src="../Assets/js/displayFunction.js"></script>

</body>
</html>