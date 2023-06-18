function overFlowOn() {
    document.body.style.overflowY = "auto";
}

function overFlowOff() {
    document.body.style.overflowY = "hidden";
}

function homeOff() {
    document.getElementById("home").style.display = "none";
}

function increaseValue(value) {
    value = parseInt(document.getElementById('inputQty').value, 10);
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

function removeFromCart(id) {
    $.ajax({
        url: "./Controller/Cart/cart.php",
        type: "POST",
        data: {
            action: "removeCart",
            id: id,

        },
        success: function (response) {
            $(".modal-body").html(response);
        }

    })
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
            homeOff()
            overFlowOff()
        }
    })
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

    // $("#modal").click(function() {


    //     $.ajax({
    //         url: "./Controller/Cart/cart.php",
    //         type: "POST",
    //         data: {
    //             action: "getCartData",
    //         },
    //         success: function(response) {
    //             console.log("test");
    //             $(".modal-body").html(response);
    //             $('#modal-aside-right').modal('show');
    //         }

    //     })

    //     $.ajax({
    //         url: "./Controller/Cart/cart.php",
    //         type: "POST",
    //         data: {
    //             action: "getSubtotal",

    //         },
    //         success: function(response) {
    //             $("#subtotal").html(response);

    //         }
    //     })
    // })

    // function addToCartModal(id) {
    //     $.ajax({
    //         url: "./Controller/Cart/cart.php",
    //         type: "POST",
    //         data: {
    //             action: "addToCartModal",
    //             id: id,
    //             qty: $("#inputQty").val()
    //         },
    //         success: function(response) {
    //             $(".modal-body").html(response);
    //             $('#modal-aside-right').modal('show');
    //         }

    //     })

    // }
