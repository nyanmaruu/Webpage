<?php

if (isset($_POST["submit"])) {

    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $email = $_POST["email"];

    include "../../Classes/Connection/Connection.php";
    include "../../Classes/AccountManagment/signUpContrClasses.php";

    $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);

    $signup->signUpUser();

    header("location: http://localhost/webpage/?oldal=login&error=SuccessfullySignedUp");
}
