<?php
include '../DB/DBKomentare.php';
session_start();

if (isset($_REQUEST['logout'])) {
    $_SESSION["id"] = -1;
    $_SESSION["username"] = "";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "Components/Head.php"; ?>
    <link rel="stylesheet" href="../CSS/Ohlasy.css">
    <title>KOMENTÁRE</title>
</head>

<body>
<h1>KINOPRO</h1>
<div id="left"></div>
<div id="right"></div>

<?php
include "Components/Navbar.php";
show_navbar();
include "Components/NavbarDays.php"
?>

<div class="container">
    <div class="chat-container">

        <form id="form_komentare" method="post" class="send-message-form">
            <label>
                <input type="text" name="nick" placeholder="Vaše meno/nick" required>
            </label>
            <label>
                <textarea class="text_area" name="text" placeholder="Miesto pre váš komentár" required></textarea>
            </label>
            <input type="submit" class="text-button" name="sent">
        </form>

    </div>
</div>


<?php
include "Components/scrollButton.php";
include "Components/Footer.php";
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="../Assets/js/scrollFunction.js"></script>
<script src="../Assets/js/Example.js"></script>
<script src="../Assets/js/Example2.js"></script>
<script src="../Assets/js/alerts.js"></script>
<script src="../Assets/js/vymaz.js"></script>


<script>


    function nacitanie() {
        $.ajax({
            type: "GET",
            url: '/Controlers/komentuj.php',
            success: function (data) {
                $('.message').remove();
                data.forEach(element => $('<div class="message">\n' +
                    <?php if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 1) {
                        echo '\'<a onclick="vymaz(\'+element.id+\')">x</a>\n\' +';
                    }
                    ?>
                    '            <div class="name">' + element.nick + '</div>\n' +
                    '            <div style="padding: 1px 0 30px 41px;margin: 30px 5px 5px -37px;"> ' + element.text + ' </div>\n' +
                    '        </div>').insertAfter($('#form_komentare')));


            }
        });

    }

</script>
<script src="../Assets/js/komentare.js"></script>

</body>
</html>




