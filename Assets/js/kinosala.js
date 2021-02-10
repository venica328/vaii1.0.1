$(document).ready(function () {
    var id_stolicky = 0;
    var modal = document.getElementById("myModal");
    var modal2 = document.getElementById("myModal2");
    nacitanie();

    //tento element sa používa pre zavretie
    var span = document.getElementsByClassName("close")[0];

    //ak používateľ klikne na x modálneho okna, zavrie sa
    span.onclick = function () {
        modal.style.display = "none";
        modal2.style.display = "none";
        $("#" + id_stolicky).toggleClass('active');
    }

    //ak používateľ klikne mimo modálneho okna, zavrie sa
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
            $("#" + id_stolicky).toggleClass('active');
        }
        if (event.target == modal2) {
            modal2.style.display = "none";
            $("#" + id_stolicky).toggleClass('active');
        }
    }

    /**
     * sedadlá sú funkčné
     * každé sedadlo má svoje id
     */
    $('.cinema-seats .seat').on('click', function () {
        $(this).toggleClass('active');
        modal.style.display = "block";
        $("#stolicka").text($(this).attr("id"));
        $("#id_sedadla").val($(this).attr("id"));
        id_stolicky = $(this).attr("id");


    });

    /**
     * @param element
     * Funkcia pre zobrazenie modálneho okna pre zrušenie rezervácie
     */
    function showModal2(element) {
        element.toggleClass('active');
        modal2.style.display = "block";
        modal.style.display = "none";
        $("#stolicka2").text(element.attr("id"));
        $("#id_sedadla2").val(element.attr("id"));
        id_stolicky = element.attr("id");
    }

    //ajax pre rezervovanie sedadla
    $('#form_nakup').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '/Controlers/nakup.php',
            data: $(this).serialize(),
            success: function (response) {
                nacitanie();
                modal.style.display = "none";
                $("#" + id_stolicky).toggleClass('active');
                alert(response.message);
            }
        });
    });

    //ajax pre zrušenie zarezervovaného sedadla
    $('#form_zrusenie').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "DELETE",
            url: '/Controlers/nakup.php?' +$(this).serialize(),
            success: function (response) {
                nacitanie();
                modal2.style.display = "none";
                $("#" + id_stolicky).toggleClass('active');
                alert(response.message);
                nacitanie();
            }
        });
    });

    /**
     * Funkcia, ktorá načíta a zobrazí sedadlá v kinosále
     * fialové sedadlá = voľné
     * červené sedadlá = rezervované používaeľmi
     * zelené sedadlá = rezervované aktuálne prihláseným používateľom
     */
    function nacitanie() {
        $.ajax({
            type: "GET",
            url: '/Controlers/nakup.php' + window.location.search,
            success: function (data) {
                for(var i=1; i <= 72; i++) {
                    $('#'+i).css("background", "purple").css("pointer-events","auto").removeClass('active');
                }
                data.forEach(element => ((element.id_pouzivatela == id_pouzivatela) ? $("#" + element.id_sedadla).css("background", "#45ae23").css("pointer-events","auto").bind('click',function (){showModal2($(this))}) : $("#" + element.id_sedadla).css("background", "red").css("pointer-events", "none")));

            }
        });
    };

    //dáva interval pre automatické refreshnutie stránky
    setInterval(function (){
        nacitanie();
    },2000);



});
