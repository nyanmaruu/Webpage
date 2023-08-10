<?php
session_start();


if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $zipcode = $_POST["zipcode"];
    $country = $_POST["country"];

    echo ($_SESSION["useruid"]);
    include "../../Classes/Connection/Connection.php";
    include "../../Querys/checkoutQuery/order.php";

    $orderItem = new Order();

    $userId = $_SESSION["userid"];

    $orderItem->setOrder($userId, $name, $email, $city, $address, $zipcode, $country);


    unset($_SESSION["cart"]);

    header("location: http://localhost/webpage/?oldal=&error=YourOrderIsComplete");
}
