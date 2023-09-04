<?php

if (isset($_POST["submit"])) {

    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];

    include "../../Classes/Connection/Connection.php";
    include "../../Classes/AccountManagment/loginContrClasses.php";

    $login = new LoginContr($uid, $pwd);

    $login->loginUser();

    if ($_SESSION["type_id"] == 1) {
        header("location: http://localhost/webpage/?oldal=adminPage");
    } else {
        header("location: http://localhost/webpage/?oldal=&error=loggedIn");
    }
}
