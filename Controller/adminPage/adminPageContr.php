<?php
require_once __DIR__ . '/../../Classes/adminPage/adminPageAction.php';

$adminAction = new AdminProfile();



if (isset($_POST["action"]) && $_POST["action"] == "listOrders") {
    echo $adminAction->userOrdersAdmin();
}

if (isset($_POST["action"]) && $_POST["action"] == "deleteOrder") {
    $adminAction->deleteOrderData($_POST["orderId"]);
}
