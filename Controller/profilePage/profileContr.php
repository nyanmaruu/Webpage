<?php
require_once __DIR__ . '/../../Classes/ProfilePage/profilePageAction.php';
require_once __DIR__ . '/../../Classes/ProfilePage/profilePageOrdersAction.php';

$userAction = new ProfileActions();
$userOrders = new ProfileOrders();

if (isset($_POST["action"]) && $_POST["action"] == "getUserData") {
    echo $userAction->userAddress();
}

if (isset($_POST["action"]) && $_POST["action"] == "setAddressData") {
    echo $userAction->setAddress();
}


if (isset($_POST["action"]) && $_POST["action"] == "checkoutAddress") {
    echo $userAction->userDataForCheckout();
}

if (isset($_POST["action"]) && $_POST["action"] == "listOrders") {
    echo $userOrders->userOrders();
}

if (isset($_POST["action"]) && $_POST["action"] == "listOrdersDate") {
    echo $userOrders->listOrders($_POST["dateFrom"], $_POST["dateTo"]);
}
