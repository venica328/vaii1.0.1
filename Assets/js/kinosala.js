$(document).ready(function () {
    var id_stolicky = 0;
    var modal = document.getElementById("myModal");
    nacitanie();

// Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
        $("#" + id_stolicky).toggleClass('active');
    }

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
            $("#" + id_stolicky).toggleClass('active');
        }
    }


    $('.cinema-seats .seat').on('click', function () {
        $(this).toggleClass('active');
        modal.style.display = "block";
        $("#stolicka").text($(this).attr("id"));
        $("#id_sedadla").val($(this).attr("id"));
        id_stolicky = $(this).attr("id");


    });

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

    function nacitanie() {
        $.ajax({
            type: "GET",
            url: '/Controlers/nakup.php' + window.location.search,
            success: function (data) {
                data.forEach(element => $("#" + element.id_sedadla).css("pointer-events", "none"));
                data.forEach(element => ((element.id_pouzivatela == id_pouzivatela) ? $("#" + element.id_sedadla).css("background", "#45ae23") : $("#" + element.id_sedadla).css("background", "red")));


            }
        });
    };

    setInterval(function (){
        nacitanie();
    },2000);



});
