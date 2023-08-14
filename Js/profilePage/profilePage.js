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
    userPageInfo();
    homeOff();
})

document.getElementById("datePickerDiv").style.display = "none";

function searchResult() {


    $.ajax({
        url: "./Controller/profilePage/profileContr.php",
        type: "POST",
        data: {

            action: "listOrdersDate",
            dateFrom: $("#datepicker").val(),
            dateTo: $("#datepicker2").val()
        },
        success: function (response) {
            $("#dateResult").html(response);
            overFlowOn();
        }
    })

}



function userPageInfo() {
    $.ajax({
        url: "./Controller/profilePage/profileContr.php",
        type: "POST",
        data: {
            action: "getUserData"

        },
        success: function (response) {
            $("#userAddressData").html(response);

        }
    })

};

function setNewAddress() {
    $.ajax({
        url: "./Controller/profilePage/profileContr.php",
        type: "POST",
        data: {
            action: "setAddressData"

        },
        success: function (response) {
            $("#userAddressData").html(response);

        }
    })

};


// function listOrders() {
//     $.ajax({
//         url: "./Controller/profilePage/profileContr.php",
//         type: "POST",
//         data: {
//             action: "listOrders"

//         },
//         success: function (response) {
//             $("#userAddressData").html(response + "</br>");

//         }
//     })

// };

function listOrders() {
    $.ajax({
        url: "./Controller/profilePage/profileContr.php",
        type: "POST",
        data: {
            action: "ordersDate"

        },
        success: function (response) {
            $("#userAddressData").html(response);
            document.getElementById("datePickerDiv").style.display = "block";;
            $("#datepicker").datepicker().datepicker("option", "dateFormat", "yy-mm-dd");
            $("#datepicker2").datepicker().datepicker("option", "dateFormat", "yy-mm-dd");


        }
    })


}
