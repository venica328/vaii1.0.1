/**
 * @param id
 * Funkcia umožňuje vymazať komentár podľa id cez ajax
 */
function vymaz(id) {
    $.ajax({
        type: "DELETE",
        url: '/Controlers/komentuj.php?id=' + id,
        success: function (response) {
            nacitanie();
        }
    });
}

