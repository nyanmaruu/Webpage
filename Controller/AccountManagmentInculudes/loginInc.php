<?php

if (isset($_POST["submit"])) {

    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];

    include "../../Classes/Connection/Connection.php";
    include "../../Classes/AccountManagment/loginContrClasses.php";

    $login = new LoginContr($uid, $pwd);

    $login->loginUser();

    header("location: http://localhost/webpage/?oldal=&error=loggedIn");
}
