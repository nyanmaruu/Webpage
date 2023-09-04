<?php
session_start();
include "../../Classes/Connection/Connection.php";
include "../../Querys/checkoutQuery/order.php";


if (isset($_POST["submit"])) {

    if (!empty($_SESSION["cart"])) {

        header("location: http://localhost/webpage/Pages/Checkout/payment.php");
    } else {
        header("location: http://localhost/webpage/?oldal=checkout&&error=CartEmpty");
    }
}
if (isset($_POST["cardPayment"])) {

    $orderItem = new Order();

    $userId = $_SESSION["userid"];

    $orderItem->setOrder($userId);

    unset($_SESSION["cart"]);
    header("location: http://localhost/webpage/Pages\Checkout\successfulyPayment.php");
}
