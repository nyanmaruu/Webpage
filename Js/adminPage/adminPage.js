function overFlowOn() {
    document.body.style.overflowY = "auto";
}

function overFlowOff() {
    document.header.style.display = "none";
}

function homeOff() {
    document.getElementById("home").style.display = "none";
}

function navHider() {
    document.querySelector(".header").style.display = "none"

}

$(document).ready(function () {
    homeOff();
    ordersResult();
    navHider();
})



function ordersResult() {


    $.ajax({
        url: "./Controller/adminPage/adminPageContr.php",
        type: "POST",
        data: {

            action: "listOrders",
        },
        success: function (response) {
            $("#ordersResult").html(response);
            overFlowOn();
        }
    })

}


function deleteOrder(id) {
    $.ajax({
        url: "./Controller/adminPage/adminPageContr.php",
        type: "POST",
        data: {
            action: "deleteOrder",
            orderId: id

        },
        success: function (response) {
            $("#ordersResult").html(response);
            ordersResult()
        }
    })

};




