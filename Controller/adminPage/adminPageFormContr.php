<?php

if (isset($_POST["submit"])) {

    $name = $_POST["name"];

    include "../../Querys/profilePageQuery.php/adminQuery.php";

    $getUserOrders = new ProfilePageDataAdmin();


    $getUserOrders->getOrdersAdmin($name);



    // header("location: http://localhost/webpage/?oldal=adminPage");
}
