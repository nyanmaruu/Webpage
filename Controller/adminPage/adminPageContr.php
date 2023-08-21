<?php
require_once __DIR__ . '/../../Classes/adminPage/adminPageAction.php';

$adminAction = new AdminProfile();


if (isset($_POST["action"]) && $_POST["action"] == "listOrdersAdmin") {
    echo $adminAction->usersData();
}

if (isset($_POST["action"]) && $_POST["action"] == "listOrdersDateAdmin") {
    echo $adminAction->userOrdersAdmin($_POST["dateFrom"], $_POST["dateTo"], $_POST["userId"]);
}

if (isset($_POST["action"]) && $_POST["action"] == "deleteOrder") {
    $adminAction->deleteOrderData($_POST["orderId"]);
}
