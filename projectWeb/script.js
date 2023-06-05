var objMain = document.getElementById("main");
var objA = document.getElementById("parta");
var objB = document.getElementById("partb");
var objC = document.getElementById("partc");

function ShowA() {
    objA.style.opacity = '1';
    objMain.style.opacity = '0';
}

function HideA() {
    objA.style.opacity = '0';
    objMain.style.opacity = '1';
}

function ShowB() {
    objB.style.opacity = '1';
    objMain.style.opacity = '0';
}

function HideB() {
    objB.style.opacity = '0';
    objMain.style.opacity = '1';
}

function ShowC() {
    objC.style.opacity = '1';
    objMain.style.opacity = '0';
}

function HideC() {
    objC.style.opacity = '0';
    objMain.style.opacity = '1';
}

document
    .getElementById("loca")
    .addEventListener("mouseover", ShowA);

document
    .getElementById("loca")
    .addEventListener("mouseout", HideA);

document
    .getElementById("locb")
    .addEventListener("mouseover", ShowB);

document
    .getElementById("locb")
    .addEventListener("mouseout", HideB);

document
    .getElementById("locc")
    .addEventListener("mouseover", ShowC);

document
    .getElementById("locc")
    .addEventListener("mouseout", HideC);


// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

var logoa = document.getElementById("logoa");
var logoaa = document.getElementById("logoaa");
var logob = document.getElementById("logob");
var logoba = document.getElementById("logoba");
var logoc = document.getElementById("logoc");
var logoca = document.getElementById("logoca");

function ShowLAA() {
    logoaa.style.opacity = '1';
    logoa.style.opacity = '0';
}

function HideLAA() {
    logoaa.style.opacity = '0';
    logoa.style.opacity = '1';
}

function ShowLBA() {
    logoba.style.opacity = '1';
    logob.style.opacity = '0';
}

function HideLBA() {
    logoba.style.opacity = '0';
    logob.style.opacity = '1';
}

function ShowLCA() {
    logoca.style.opacity = '1';
    logoc.style.opacity = '0';
}

function HideLCA() {
    logoca.style.opacity = '0';
    logoc.style.opacity = '1';
}

document
    .getElementById("logoa")
    .addEventListener("mouseover", ShowLAA);

document
    .getElementById("logoa")
    .addEventListener("mouseout", HideLAA);

document
    .getElementById("logob")
    .addEventListener("mouseover", ShowLBA);

document
    .getElementById("logob")
    .addEventListener("mouseout", HideLBA);

document
    .getElementById("logoc")
    .addEventListener("mouseover", ShowLCA);

document
    .getElementById("logoc")
    .addEventListener("mouseout", HideLCA);

var pica1 = document.getElementById("pica1");
var pica2 = document.getElementById("pica2");
var pica3 = document.getElementById("pica3");
var texta1 = document.getElementById("texta1");
var texta2 = document.getElementById("texta2");
var texta3 = document.getElementById("texta3");

function ShowA1() {
    pica1.style.opacity = '1';
    texta1.style.opacity = '1';
    pica2.style.opacity = '0';
    texta2.style.opacity = '0';
    pica3.style.opacity = '0';
    texta3.style.opacity = '0';
}

function ShowA2() {
    pica1.style.opacity = '0';
    texta1.style.opacity = '0';
    pica2.style.opacity = '1';
    texta2.style.opacity = '1';
    pica3.style.opacity = '0';
    texta3.style.opacity = '0';
}

function ShowA3() {
    pica1.style.opacity = '0';
    texta1.style.opacity = '0';
    pica2.style.opacity = '0';
    texta2.style.opacity = '0';
    pica3.style.opacity = '1';
    texta3.style.opacity = '1';
}

document
    .getElementById("loga1")
    .addEventListener("mouseover", ShowA1);

document
    .getElementById("loga2")
    .addEventListener("mouseover", ShowA2);

document
    .getElementById("loga3")
    .addEventListener("mouseover", ShowA3);

var picb1 = document.getElementById("picb1");
var picb2 = document.getElementById("picb2");
var picb3 = document.getElementById("picb3");
var textb1 = document.getElementById("textb1");
var textb2 = document.getElementById("textb2");
var textb3 = document.getElementById("textb3");

function ShowB1() {
    picb1.style.opacity = '1';
    textb1.style.opacity = '1';
    picb2.style.opacity = '0';
    textb2.style.opacity = '0';
    picb3.style.opacity = '0';
    textb3.style.opacity = '0';
}

function ShowB2() {
    picb1.style.opacity = '0';
    textb1.style.opacity = '0';
    picb2.style.opacity = '1';
    textb2.style.opacity = '1';
    picb3.style.opacity = '0';
    textb3.style.opacity = '0';
}

function ShowB3() {
    picb1.style.opacity = '0';
    textb1.style.opacity = '0';
    picb2.style.opacity = '0';
    textb2.style.opacity = '0';
    picb3.style.opacity = '1';
    textb3.style.opacity = '1';
}

document
    .getElementById("logb1")
    .addEventListener("mouseover", ShowB1);

document
    .getElementById("logb2")
    .addEventListener("mouseover", ShowB2);

document
    .getElementById("logb3")
    .addEventListener("mouseover", ShowB3);

var picc1 = document.getElementById("picc1");
var picc2 = document.getElementById("picc2");
var textc1 = document.getElementById("textc1");
var textc2 = document.getElementById("textc2");

function ShowC1() {
    picc1.style.opacity = '1';
    textc1.style.opacity = '1';
    picc2.style.opacity = '0';
    textc2.style.opacity = '0';
}

function ShowC2() {
    picc1.style.opacity = '0';
    textc1.style.opacity = '0';
    picc2.style.opacity = '1';
    textc2.style.opacity = '1';
}

document
    .getElementById("logc1")
    .addEventListener("mouseover", ShowC1);

document
    .getElementById("logc2")
    .addEventListener("mouseover", ShowC2);
    
