$("#modal").click(function () {


    $.ajax({
        url: "./Controller/Cart/cart.php",
        type: "POST",
        data: {
            action: "getCartData",
        },
        success: function (response) {
            $(".modal-body").html(response);
            $('#modal-aside-right').modal('show');
            subTotal();
        }
    })


})

function addToCartModal(id) {
    $.ajax({
        url: "./Controller/Cart/cart.php",
        type: "POST",
        data: {
            action: "addToCartModal",
            id: id,
            qty: $("#inputQty").val()
        },
        success: function (response) {
            $(".modal-body").html(response);
            $('#modal-aside-right').modal('show');

        },

    })

    subTotal();
}

function showCartDetails() {


    $.ajax({
        url: "./Controller/Cart/cart.php",
        type: "POST",
        data: {
            action: "getCartDataForCheckout",
        },
        success: function (response) {
            $(".cart-item").html(response);
            subTotal();
        }
    })


}
// function increaseValue(value) {
//     value = parseInt(document.getElementById('inputQty').value, 10);
//     value = isNaN(value) ? 0 : value;
//     value++;
//     document.getElementById('inputQty').value = value;

// }

// function decreaseValue(value) {
//     value = parseInt(document.getElementById('inputQty').value, 10);
//     value = isNaN(value) ? 0 : value;
//     if (value > !0) {
//         value--;
//     }
//     document.getElementById('inputQty').value = value;
// }

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

    $.ajax({
        url: "./Controller/Cart/cart.php",
        type: "POST",
        data: {
            action: "getCartData",
        },
        success: function (response) {
            $(".modal-body").html(response);
            $('#modal-aside-right').modal('show');
        }
    })
    subTotal();
}


function subTotal() {
    $.ajax({
        url: "./Controller/Cart/cart.php",
        type: "POST",
        data: {
            action: "getSubtotal",

        },
        success: function (response) {
            $("#subtotal").html(response);
        }
    })
}

