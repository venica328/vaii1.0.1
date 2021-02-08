<?php
session_start();
include "../DB/DBPouzivatelia.php";
include "../Controlers/register.php";
register();
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