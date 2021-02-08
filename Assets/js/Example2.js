function highlight() {
    var i = new Date();
    var n = i.getDay();
    return n;
}
    var a = document.getElementById("monday");
    var b = document.getElementById("thuesday");
    var c = document.getElementById("wednesday");
    var d = document.getElementById("thursday");
    var e = document.getElementById("friday");
    var f = document.getElementById("saturday");
    var g = document.getElementById("sunday");

    if(highlight() === 1) { a.style.backgroundColor = "purple"; }
    if(highlight() === 2) { b.style.backgroundColor = "purple"; }
    if(highlight() === 3) { c.style.backgroundColor = "purple"; }
    if(highlight() === 4) { d.style.backgroundColor = "purple"; }
    if(highlight() === 5) { e.style.backgroundColor = "purple"; }
    if(highlight() === 6) { f.style.backgroundColor = "purple"; }
    if(highlight() === 0) { g.style.backgroundColor = "purple"; }






