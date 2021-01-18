<?php

if(session_id()==''||!isset($_SESSION)) {
    session_start();
}
include_once "database.php";
?>

<!DOCTYPE html>
<html lang="sk">
<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Editovanie</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="CSS/Edit.css">

</head>
<body>


<?php


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['uploadfilesub'])) {
//declaring variables
    $filename = $_FILES['uploadfile']['name'];
    $filetmpname = $_FILES['uploadfile']['tmp_name'];
//folder where images will be uploaded
    $folder = 'Images/';
//function for saving the uploaded images in a specific folder
    move_uploaded_file($filetmpname, $folder . $filename);
//inserting image details (ie image name) in the database
    $db = connectDB();
    $id_filmu = test_input($_GET["id_filmu"]);
    $sql = "UPDATE vaiiko.images SET nazov = '$filename' where id_filmu=$id_filmu";
    $db->query($sql);
    disconnectDB($db);
}


?>

<div class="register-photo" style="background: purple;">
    <div class="form-container">

        <form action="" method="post" enctype="multipart/form-data" >
            <input type="file" name="uploadfile" />
            <input type="submit" onclick="alertImage()" name="uploadfilesub" value="upload" />
            <a href="index.php">HOME</a>
        </form>
    </div>

</div>



<script src="Assets/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.edit.js"></script>
<script src="Assets/js/displayFunction.js"></script>

</body>
</html>