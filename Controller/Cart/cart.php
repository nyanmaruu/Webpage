<?php
require_once __DIR__ . '/../../Classes/Cart/cartData.php';

$cardAction = new CartData();

if (isset($_POST["action"]) && $_POST["action"] == "getCartData") {
    echo $cardAction->dataOfCart();
}

if (isset($_POST["action"]) && $_POST["action"] == "getCartDataForCheckout") {
    echo $cardAction->dataOfCartCheckout();
}


if (isset($_POST["action"]) && $_POST["action"] == "addToCartModal") {
    echo $cardAction->addToCart();
}

if (isset($_POST["action"]) && $_POST["action"] == "removeCart") {
    echo $cardAction->removeCartSess();
}


if (isset($_POST["action"]) && $_POST["action"] == "removeCheckout") {
    echo $cardAction->removeCheckoutSess();
}

if (isset($_POST["action"]) && $_POST["action"] == "getSubtotal") {
    echo $cardAction->getSubtotal();
}

if (isset($_POST["action"]) && $_POST["action"] == "getItemsNumber") {
    echo $cardAction->getTotalItemsNumber();
}

if (isset($_POST["action"]) && $_POST["action"] == "getItemNumberForCart") {
    echo $cardAction->itemsNumberCartModal();
}
