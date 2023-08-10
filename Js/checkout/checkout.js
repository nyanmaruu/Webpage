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
    showCartDetails();
    userAddressForCheckout();
})


function userAddressForCheckout() {
    $.ajax({
        url: "./Controller/profilePage/profileContr.php",
        type: "POST",
        data: {
            action: "checkoutAddress"

        },
        success: function (response) {
            $(".formForCheckout").html(response);

        }
    })

};