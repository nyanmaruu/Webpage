<?php
session_start();


if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $zipcode = $_POST["zipcode"];
    $country = $_POST["country"];

    include "../../Querys/profilePageQuery.php/profilePageQuery.php";

    $setUserAddressInfo = new ProfilePageData();

    $userId = $_SESSION["userid"];

    $setUserAddressInfo->setAddressData($userId, $name, $email, $city, $address, $zipcode, $country);

    header("location: http://localhost/webpage/?oldal=profilePage&error=yourAddressIsSet");
}
