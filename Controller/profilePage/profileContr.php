<?php
require_once __DIR__ . '/../../Classes/ProfilePage/profilePageAction.php';


$userAction = new ProfileActions();


if (isset($_POST["action"]) && $_POST["action"] == "getUserData") {
    echo $userAction->userAddress();
}

if (isset($_POST["action"]) && $_POST["action"] == "setAddressData") {
    echo $userAction->setAddress();
}


if (isset($_POST["action"]) && $_POST["action"] == "checkoutAddress") {
    echo $userAction->userDataForCheckout();
}

if (isset($_POST["action"]) && $_POST["action"] == "listOrdersDate") {
    echo $userAction->listOrders($_POST["dateFrom"], $_POST["dateTo"]);
}
