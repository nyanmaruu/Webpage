<?php
session_start();


if (isset($_POST["submit"])) {

    $date = $_POST["date"];


    include "../../Querys/profilePageQuery.php/profilePageQuery.php";

    $setUserAddressInfo = new ProfilePageData();

    $userId = $_SESSION["userid"];

    $setUserAddressInfo->setAddressData($userId, $name, $email, $city, $address, $zipcode, $country);

    header("location: http://localhost/webpage/?oldal=profilePage&error=yourAddressIsSet");
}
