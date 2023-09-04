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


function searchResult() {


    $.ajax({
        url: "./Controller/profilePage/profileContr.php",
        type: "POST",
        data: {

            action: "listOrdersData",
        },
        success: function (response) {
            $("#userAddressData").html(response);
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


