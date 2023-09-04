$(document).ready(function () {
    itemsNumberCart();
})

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
            itemsNumber();
            itemsNumberCart();
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
            $("#liveToast").html();
            toast();
            itemsNumberCart();
        },

    })

    subTotal();
    itemsNumber();
    itemsNumberCart();

}


function toast() {
    const toastLiveExample = document.getElementById('liveToast')
    const toast = new bootstrap.Toast(toastLiveExample)
    toast.show()
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
            itemsNumber();
            itemsNumberCart();
        }
    })


}


function itemsNumberCart() {
    $.ajax({
        url: "./Controller/Cart/cart.php",
        type: "POST",
        data: {
            action: "getItemNumberForCart",

        },
        success: function (response) {
            $(".shoppingCart").html(response);
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

        }
    })
    subTotal();
    itemsNumberCart();
}

function removeFromCheckout(id) {
    $.ajax({
        url: "./Controller/Cart/cart.php",
        type: "POST",
        data: {
            action: "removeCheckout",
            id: id,

        },
        success: function (response) {
            $(".cart-item").html(response);
            itemsNumberCart();
        }

    })

    showCartDetails();
    subTotal();
    itemsNumber();
    itemsNumberCart();
}


function subTotal() {
    $.ajax({
        url: "./Controller/Cart/cart.php",
        type: "POST",
        data: {
            action: "getSubtotal",

        },
        success: function (response) {
            $(".subtotal").html(response);
        }
    })
}

function itemsNumber() {
    $.ajax({
        url: "./Controller/Cart/cart.php",
        type: "POST",
        data: {
            action: "getItemsNumber",

        },
        success: function (response) {
            $(".itemsNumber").html(response);
        }
    })

}


