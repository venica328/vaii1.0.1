<?php
if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 1) {
    session_start();
}

include "../DB/DBFilmy.php";
include "../Controlers/edit.php";
$storage = new DBFilmy();
edit();
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



<div class="register-photo" style="background: purple;">
    <div class="form-container">
        <form method="post" style="word-wrap: break-word;" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);
        echo '?id_filmu=' . inicializacia()->getIdFilmu() ?>">
            <label>Názov filmu:</label>
            <div class="form-group"><input class="form-control"
                                           style="height: 50px; background: #e7e3e8;"
                                           type="text" name="info"
                                           value="<?php echo inicializacia()->getInfo() ?>">
            </div>
            <label>Obsah filmu:</label>
            <div class="form-group"><textarea class="form-control"
                                              style="padding: 5% 0% 30% 2%; background: #e7e3e8;"
                                              name="obsah"
                                              placeholder=""><?php echo inicializacia()->getObsah() ?></textarea>
            </div>
            <label>Obrázok:</label>
            <div><input type="file" name="uploadfile"/></div>

            <div class="form-group"><input class="form-control"
                                           style="padding: 5% 0% 30% 2%; background: #e7e3e8;"
                                           type="hidden" name="id_filmu" value="<?php echo inicializacia()->getIdFilmu() ?>">
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-block" onclick="alertAdd()" type="submit" name="submit" value="upload"
                        style="background-color: lightseagreen; display: block; width: 40%; margin: auto; text-align: center;">
                    UPLOAD!
                </button>
            </div>

            <a href="../index.php">HOME</a>
        </form>
    </div>

</div>


<script src="../Assets/js/jquery.min.js"></script>
<script src="../Assets/js/alerts.js"></script>

</body>
</html>