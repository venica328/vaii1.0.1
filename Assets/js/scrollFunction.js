var myButton = document.getElementById("myButton");

window.onscroll = function() {scrollFunction()};

/**
 * Funkcia, ktorá umožňuje scrollButtonu objaviť sa ak sa stránka posunie
 */
function scrollFunction() {
    if(document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        myButton.style.display = "block";
    } else {
        myButton.style.display = "none"
    }
}

/**
 * Funkcia, ktorá umožní dostať sa na vrch stránky
 */
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}