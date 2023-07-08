function overFlowOn() {
    document.body.style.overflowY = "auto";
}

function overFlowOff() {
    document.body.style.overflowY = "hidden";
}

function homeOff() {
    document.getElementById("home").style.display = "none";
}

$(document).ready(function () {
    overFlowOff();
    homeOff();
    showCartDetails();
})
console.log("test");

