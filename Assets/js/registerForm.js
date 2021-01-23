function validateForm() {
    var x = document.forms["registerForm"]["password"].value;
    var y = document.forms["registerForm"]["password_again"].value;
    if (x.length < 8 && y.length < 8 ) {
        alert("Kratke heslo!");
        return false;
    }
    if(x !== y) {
        alert("Hesla sa nezhoduju!");
        return false;
    }
    console.log(x);
}
