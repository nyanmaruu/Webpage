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
    coffees();

})


function oneCoffees(id) {

    $.ajax({
        url: "./Controller/oneProductController/oneProduct.php",
        type: "POST",
        data: {
            action: "getOneCoffee",
            id: id
        },
        success: function (response) {
            $("#baseContent").html(response);
            homeOff();
            overFlowOff();
            increaseValue();
            decreaseValue();

        }


    })
}

function increaseValue(value) {
    value = parseInt(document.getElementById('inputQty').value);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('inputQty').value = value;

}

function decreaseValue(value) {
    value = parseInt(document.getElementById('inputQty').value, 10);
    value = isNaN(value) ? 0 : value;
    if (value > !0) {
        value--;
    }
    document.getElementById('inputQty').value = value;
}

function coffees() {
    $.ajax({
        url: "./Controller/ProductsController/productsController.php",
        type: "POST",
        data: {
            action: "getAllCoffee"

        },
        success: function (response) {
            $("#baseContent").html(response);
            homeOff()
            overFlowOn()



        }
    })

};

