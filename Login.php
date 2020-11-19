<?php

session_start();
?>

<!DOCTYPE html>
<html lang="sk">
<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>EviDB - Registrácia</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="CSS/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="CSS/Login.css">
    <link rel="stylesheet" href="CSS/Footer-Dark.css">

</head>
<body>


<?php
include "database.php";
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = connectDB();
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);

    if ($password != "admin" && $username != "admin") {
        $message = "Nie ste admin! Prihlasovacie údaje sa nezhodujú!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    } else if ($password == "admin" && $username == "admin") {
        $password = md5($password);
        $sql = "INSERT INTO user (username, password)".
            " VALUES ('$username', '$password')";

        if ($db->query($sql) === TRUE) {
            $message = "Boli ste úspešne zaregistrovaný!";
            echo "<script type='text/javascript'>alert('$message');
                location.replace('login.php')</script>";
        }



    }
    disconnectDB($db);
}

$db = connectDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);

    $prikaz = "SELECT * FROM user";
    $result = $db->query($prikaz);

    if ($result->num_rows > 0) {
        $password = md5($password);
        while ($row = $result->fetch_assoc()) {
            if ($username == $row["username"] && $password == $row["password"]) {
                $_SESSION["id"] = $row["id"];
                $_SESSION["username"] = $row["username"];
                header('Location: index.php');
                exit;
            }
        }
        $message = "Zadali ste nesprávne meno alebo heslo!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }

    disconnectDB($db);
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
        <div class="image-holder"></div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <div class="form-group"><input class="form-control" type="text" name="username"
                                           placeholder="Login" required></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Heslo "
                                           required></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: lightseagreen;">Prihláste sa ako admin!
                    </button></div>
            <a href="Index.php">HOME</a>
    </div>
</div>




<script src="Assets/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>