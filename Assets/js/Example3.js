

function myFunction3() {
    var x = document.getElementById("cards");
    if (x.className === "cards") {
        x.className += " responsive";
    } else {
        x.className = "cards";
    }
}