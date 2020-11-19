

function myFunction2() {
    var x = document.getElementById("navbarDays");
    if (x.className === "navbarDays") {
        x.className += " responsive";
    } else {
        x.className = "navbarDays";
    }
}