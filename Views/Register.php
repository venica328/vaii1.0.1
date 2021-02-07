<?php
session_start();
include "../Controlers/DBPouzivatelia.php";
?>

<!DOCTYPE html>
<html lang="sk">

<head>
    <?php include "Components/Head.php"; ?>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/Login.css">
    <title>Prihlásenie</title>
</head>
<body>


<?php
if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["password_again"])) {
    $storage = new DBPouzivatelia();
    $ret = $storage->Register($_POST["username"], $_POST["password"], $_POST["password_again"]);
    if($ret == 0) {
        $message = "Zadali ste nesprávne meno alebo heslo!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Location: Login.php');
        exit;
    } elseif ($ret == -1) {
        $message = "Používateľské meno už existuje!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    } elseif ($ret == -2) {
        $message = "Heslá sa nezhodujú!/Nemajú dĺžku 8 znakov!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }else {
        $message = "Neznáma chyba!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

?>

<div class="register-photo" style="background: purple;">
    <div class="form-container">
        <div class="image-holder"></div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()" name="registerForm">

            <div class="form-group"><input class="form-control" type="text" name="username"
                                           placeholder="Username" required></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"
                                           required></div>
            <div class="form-group"><input class="form-control" type="password" name="password_again"
                                           placeholder="Password repeat!"
                                           required></div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit" style="background-color: lightseagreen;">
                    Zaregistrujte sa!
                </button>
            </div>
            <a href="../index.php">HOME</a>
        </form>
    </div>
</div>


<script src="../Assets/js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../Assets/js/registerForm.js"></script>

</body>
</html>