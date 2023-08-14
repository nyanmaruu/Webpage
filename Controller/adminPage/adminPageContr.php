<?php
require_once __DIR__ . '/../../Classes/adminPage/adminPageAction.php';

$userAction = new ProfileOrdersAdmin();


if (isset($_POST["action"]) && $_POST["action"] == "listOrdersAdmin") {
    echo $userAction->usersData();
}
