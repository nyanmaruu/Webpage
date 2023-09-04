<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Meggyesi József Vizsga Projekt</title>
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand offcanvas" href="?oldal="> <img src="./Pictures/logo/coffee-grain.png" alt="Coffe_Grain" width="40" height="35"></a>
                <button class="navbar-toggler " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <a class="navbar-brand" href="?oldal="> <img src="./Pictures/logo/coffee-grain.png" alt="Coffe_Grain" width="40" height="35"></a>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>

                    <div class="container-fluid offcanvas-body">
                        <div id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                                <li class="nav-item active">
                                    <a class="nav-link" href="?oldal=">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="?oldal=allCoffee">Coffees</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="?oldal=about">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="?oldal=contact">Contact</a>
                                </li>
                            </ul>

                        </div>

                    </div>

                </div>

                <div class="d-flex">
                    <?php

                    if (isset($_SESSION["userid"]) && $_SESSION["type_id"] != 1) {
                    ?>

                        <a class="nav-link me-3" href="?oldal=profilePage"><?php echo $_SESSION["useruid"]; ?></a>
                        <a class="nav-link me-3" href="./Controller/AccountManagmentInculudes/logoutInc.php"><i class="fas fa-sign-out-alt"></i></a>

                    <?php
                    } else if (isset($_SESSION["userid"]) && $_SESSION["type_id"] == 1) {
                    ?>

                        <a class="nav-link me-3" href="?oldal=adminPage">Admin</a>
                        <a class="nav-link me-3" href="./Controller/AccountManagmentInculudes/logoutInc.php"><i class="fas fa-sign-out-alt"></i></a>

                    <?php
                    } else {
                    ?>

                        <a class="nav-link me-3" href="?oldal=login"><i class="fas fa-user fa-lg"></i></a>

                    <?php
                    }

                    ?>


                    <a class="nav-link" id="modal" class="btn "><i class="fas fa-shopping-cart fa-lg shoppingCart">

                        </i></a>

                </div>
            </div>


        </nav>
    </header>

    <section class="home" id="home">
        <div class="row">
            <div class="image">
                <img id="frontPageImage" src="Pictures/frontPage/about-img.jpg" alt="">
            </div>
            <div class="content">
                <h3 class="title">what' s make our coffee special!</h3>
                <p>Quality: high quality ingredients,best delivery time, consistency, fresh and appealing sweet & savory selections are keys to success. Selection: have the most popular products in the market and something special that makes you unique.</p>
                <a href="?oldal=allCoffee" class="btn">Shop Now</a>
                <a href="?oldal=about" class="btn">read more</a>
                <div class="icons-container">
                    <div class="icons">
                        <img src="Pictures/frontPage/about-icon-1.png" alt="">
                        <h3>quality coffee</h3>
                    </div>
                    <div class="icons">
                        <img src="Pictures/frontPage/about-icon-2.png" alt="">
                        <h3>our branches</h3>
                    </div>
                    <div class="icons">
                        <img src="Pictures/frontPage/about-icon-3.png" alt="">
                        <h3>free delivery</h3>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section>

        <div id="modal-aside-right" class="modal fixed-left fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Your Shopping Cart:
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="d-flex justify-content-end subtotal">
                    </div>
                    <div class="modal-footer border-top-0 d-flex justify-content-between">
                        <button type="button" class="btn " data-bs-dismiss="modal">Close</button>
                        <a href="?oldal=checkout" type="button" class="btn">Checkout</a>
                    </div>
                </div>
            </div>
    </section>

    <div class="toast-container  top-0 end-0  pt-5">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Cart Update</strong>
                <small>Just now!</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Added To The Cart!
            </div>
        </div>
    </div>


    <div class="errorHandler"></div>
    <div class="container">


        <?php
        if (isset($_GET["oldal"])) {
            switch ($_GET["oldal"]) {
                case 'indexPage':
                    include 'index.php';
                    break;
                case 'allCoffee':
                    include './Pages/Products/allProduct.php';
                    break;
                case 'contact':
                    include './Pages/contact/contact.php';
                    break;
                case 'about':
                    include './Pages/About/about.php';
                    break;
                case 'login':
                    include './Pages/LoginSignUp/loginSignUp.php';
                    break;
                case 'cart':
                    include './Pages/cart/cart.php';
                    break;
                case 'checkout':
                    include './Pages/Checkout/checkout.php';
                    break;
                case 'profilePage':
                    include './Pages/ProfilePage/profilePage.php';
                    break;
                case 'adminPage':
                    include './Pages/adminPage/adminPage.php';
                    break;
            }
        }
        ?>

    </div>


    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; Coffee Co.</p>
                </div>

                <div class="row">
                    <span> <strong>Készítette: </strong>Meggyesi József Márk</span>
                </div>

            </div>
        </div>

    </footer>

    <script src="main.js"></script>
    <script src="./Js/cart/cart.js"></script>
</body>

</html>