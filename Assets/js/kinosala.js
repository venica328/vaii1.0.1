$(document).ready(function () {
    var id_stolicky = 0;
    var modal = document.getElementById("myModal");

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


    stolicky.forEach(element => $("#" + element).css("background", "red"));
    stolicky.forEach(element => $("#" + element).css("pointer-events", "none"));
    $('.cinema-seats .seat').on('click', function () {
        $(this).toggleClass('active');
        modal.style.display = "block";
        $("#stolicka").text($(this).attr("id"));
        $("#id_sedadla").val($(this).attr("id"));
        id_stolicky = $(this).attr("id");


    });
console.log("123");
    $(document).ready(function () {
        $('#form_nakup').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'login.php',
                data: $(this).serialize(),
                success: function (response) {
                    var jsonData = JSON.parse(response);

                    // user is logged in successfully in the back-end
                    // let's redirect
                    if (jsonData.success == "1") {
                        location.href = 'my_profile.php';
                    } else {
                        alert('Invalid Credentials!');
                    }
                }
            });
        });
    });

});