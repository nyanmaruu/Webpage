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
    homeOff();
    listOrdersAdmin();
})


function listOrdersAdmin() {
    $.ajax({
        url: "./Controller/adminPage/adminPageContr.php",
        type: "POST",
        data: {
            action: "listOrdersAdmin"

        },
        success: function (response) {
            $("#users").html(response);

        }
    })


};