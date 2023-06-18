$("#modal").click(function () {


    $.ajax({
        url: "./Controller/Cart/cart.php",
        type: "POST",
        data: {
            action: "getCartData",
        },
        success: function (response) {
            console.log("test");
            $(".modal-body").html(response);
            $('#modal-aside-right').modal('show');
        }

    })

    $.ajax({
        url: "./Controller/Cart/cart.php",
        type: "POST",
        data: {
            action: "getSubtotal",

        },
        success: function (response) {
            $("$subtotal").html(response);

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
        }

    })

}
