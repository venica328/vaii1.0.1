$(document).ready(function () {
    nacitanie();

    /**
     * ajax pre načítanie komentárov
     */
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

    //dáva interval pre automatické refreshnutie stránky
    setInterval(function (){
        nacitanie();
    },5000);


});