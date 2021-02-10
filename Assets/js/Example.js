/**
 * Umožňuje responzívnosť pre navbar
 */
function myFunction() {
    var x = document.getElementById("myNavbar");
    if (x.className === "navbar") {
        x.className += " responsive";
    } else {
        x.className = "navbar";
    }
}

/**
 * Umožňuje responzívny dizajn pre navbarDays
 */
function myFunctionDays() {
    var x = document.getElementById("navbarDays");
    if (x.className === "navbarDays") {
        x.className += " responsive";
    } else {
        x.className = "navbarDays";
    }
}