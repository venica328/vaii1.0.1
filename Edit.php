<?php

session_start();
?>

<!DOCTYPE html>
<html lang="sk">
<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>EviDB - Editovanie</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="CSS/Edit.css">

</head>
<body>


<?php
include 'database.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = connectDB();
    $info = test_input($_POST["info"]);
    $obsah = test_input($_POST["obsah"]);


    $sql = "INSERT INTO vaiiko.table ( info, obsah)" .
        " VALUES ('$info', '$obsah')";


    if ($db->query($sql) === TRUE) {
        $message = "Informacie k filmu boli uspesne pridane.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    disconnectDB($db);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_GET["input"])) {
            $db = connectDB();
            $info = test_input($_POST["info"]);
            $obsah = test_input($_POST["obsah"]);

        $sql = "UPDATE vaiiko.`table` SET info = $info, obsah = $obsah where id>0";

    }

}



function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<div class="register-photo" style="background: purple;">
    <div class="form-container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <div class="form-group"><input class="form-control"
                style="height: 50px; background: #e7e3e8;"
                type="text" name="info" placeholder="Názov filmu">
            </div>

            <div class="form-group"><input class="form-control"
                style="padding: 5% 0% 30% 2%; background: #e7e3e8;"
                type="text" name="obsah" placeholder="Obsah filmu ">
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit"
                        style="background-color: lightseagreen; display: block; width: 40%; margin: auto; text-align: center;">Uloz zmeny!</button>
            </div>

            <a href="index.php">HOME</a>
        </form>
    </div>

</div>




<script src="Assets/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.edit.js"></script>

</body>
</html>