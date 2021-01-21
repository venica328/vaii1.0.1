<?php
session_start();
include "../Controlers/DBPouzivatelia.php";
?>

<!DOCTYPE html>
<html lang="sk">

<head>
    <?php include "../Head.php"; ?>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/Login.css">
    <title>Prihlásenie</title>
</head>
<body>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $storage = new DBPouzivatelia();
    if($storage->Login($username, $password)) {
        header('Location: ../index.php');
        exit;
    } else {
        $message = "Zadali ste nesprávne meno alebo heslo!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

?>

<div class="register-photo" style="background: purple;">
    <div class="form-container">
        <div class="image-holder"></div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <div class="form-group"><input class="form-control" type="text" name="username"
                                           placeholder="Login" required></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Heslo "
                                           required></div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit" style="background-color: lightseagreen;">
                    Prihláste sa ako admin!
                </button>
            </div>
            <a href="../index.php">HOME</a>
    </div>
</div>


<script src="../Assets/js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>