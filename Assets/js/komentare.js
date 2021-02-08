$(document).ready(function () {
    nacitanie();

    $('#form_komentare').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '/Controlers/komentuj.php',
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