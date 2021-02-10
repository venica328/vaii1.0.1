/**
 * @returns {boolean}
 * Funkcia ošetruje na strane klienta, či vkladané dáta majú potrebnú dĺžku a či sa dáta zhodujú
 */
function validateForm() {
    var x = document.forms["registerForm"]["password"].value;
    var y = document.forms["registerForm"]["password_again"].value;
    if (x.length < 8 && y.length < 8 ) {
        alert("Krátke heslo!");
        return false;
    }
    if(x !== y) {
        alert("Heslá sa nezhodujú!");
        return false;
    }
    console.log(x);
}
