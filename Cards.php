
<?php

include 'database.php';

$info = $obsah = "";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["delete"])) {
        $db = connectDB();
        $sql = "DELETE FROM vaiiko.table where id > 0";
        $db->query($sql);
        disconnectDB($db);
    }
}


function show_edit($id)
{
    if (!isset($_SESSION["id"]) || $_SESSION["id"] == -1) {
        $db = connectDB();
        $prikaz = "SELECT info, obsah FROM vaiiko.table WHERE id>0";
        $result = $db->query($prikaz);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '
                    <p>' . $row["info"] . '</p>
                    <p>' . $row["obsah"] . '</p>         
                ';
            }
        }
        disconnectDB($db);
        echo '<a class="buyButton" href="Kinosala.php">NÁKUP</a>';

    } else {
        $db = connectDB();
        $prikaz = "SELECT * FROM vaiiko.`table` WHERE id>0";
        $result = $db->query($prikaz);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '
                                    <p>' . $row["info"] . '</p>
                                    <p>' . $row["obsah"] . '</p>
                                    
                    ';
            }
        }
        disconnectDB($db);
        echo '<a class="buyButton" href="Edit.php">EDITOVANIE</a>
              <form method="post">
              <a class="editButton" style="bottom: -80px;" type="button" href="index.php?delete">DELETE</a>
              
              </form>';
    }
}
?>

