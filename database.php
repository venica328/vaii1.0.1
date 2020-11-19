<?php

function connectDB()
{
    $conn = mysqli_connect("localhost", "root", "dtb456", "vaiiko");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_set_charset($conn, 'utf8');
    return $conn;
}

function disconnectDB($vstup)
{
    mysqli_close($vstup);
}


?>
