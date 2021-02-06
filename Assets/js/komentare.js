$(document).ready(function () {
    nacitanie();
    console.log(sessionStorage.getItem("isAdmin"));

    $('#form_komentare').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'komentuj.php',
            data: $(this).serialize(),
            success: function (response) {
                nacitanie();
                $('#form_komentare')[0].reset();
            }
        });
    });

    setInterval(function (){
        nacitanie();
    },5000);



});