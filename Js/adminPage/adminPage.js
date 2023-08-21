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
    $("#datepicker").datepicker().datepicker("option", "dateFormat", "yy-mm-dd");
    $("#datepicker2").datepicker().datepicker("option", "dateFormat", "yy-mm-dd");
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
            console.log(response);

        }
    })

};

function deleteOrder(id) {
    $.ajax({
        url: "./Controller/adminPage/adminPageContr.php",
        type: "POST",
        data: {
            action: "deleteOrder",
            orderId: id

        },
        success: function (response) {
            $("#dateResult").html(response);
            searchResultAdmin()
        }
    })

};





function searchResultAdmin() {


    $.ajax({
        url: "./Controller/adminPage/adminPageContr.php",
        type: "POST",
        data: {

            action: "listOrdersDateAdmin",
            dateFrom: $("#datepicker").val(),
            dateTo: $("#datepicker2").val(),
            userId: $("#users").val(),
        },
        success: function (response) {
            $("#dateResult").html(response);
            overFlowOn();
        }
    })

}