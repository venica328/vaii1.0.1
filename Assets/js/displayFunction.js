function showFunction() {
    var x = document.getElementById("info","info2","info3");
    if(x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function alertDelete() {
    alert("Vymazali ste dáta!")
}

function alertAdd() {
    alert("Pridali ste dáta!")
}

function alertImage() {
    alert("Pridali ste obrázok!")
}
