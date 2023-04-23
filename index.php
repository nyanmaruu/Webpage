<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

    <title>Meggyesi József Vizsga Projekt</title>
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="?oldal="> <img src="./Pictures/logo/coffee-grain.png" alt="Coffe_Grain" width="40" height="35"></a>
                <div class="d-flex align-items-center position">
                    <ul class="navbar-nav">
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
                <div class="navbar-right d-flex justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="?oldal=cart"><i class="fas fa-shopping-cart fa-lg"></i></a>
                        </li>
                        <?php
                        if (isset($_SESSION["userid"])) {
                        ?>
                            <!-- <li class="nav-item"> -->
                            <a class="nav-link" href="#"><?php echo $_SESSION["useruid"]; ?></a>
                            <a class="nav-link" href="./Controller/AccountManagmentInculudes/logoutInc.php">LOGOUT</a>
                            <!-- </li> -->
                        <?php
                        } else {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="?oldal=login"><i class="fas fa-sign-in-alt fa-lg"></i> Login</a>
                            </li>
                        <?php
                        }

                        ?>

                    </ul>
                </div>
            </div>
            </div>
        </nav>
    </header>

    <section class="home" id="home">
        <div class="row">
            <div class="image">
                <img src="Pictures/frontPage/about-img.png" alt="">
            </div>
            <div class="content">
                <h3 class="title">what's make our coffee special!</h3>
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

    <div class="errorHandler"></div>
    <div class="container">
        <div class="row d-flex justify-content-center" id="baseContent">



        </div>


    </div>


    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; Coffee Co.</p>
                </div>

                <div class="row">
                    <span> <strong>Készítette: </strong>Meggyesi József</span>
                </div>

            </div>
        </div>
        </div>
    </footer>

    <?php
    if (isset($_GET["oldal"])) {
        switch ($_GET["oldal"]) {
            case 'indexPage':
                include 'index.php';
                break;
            case 'allCoffee':
                include './Pages/allCoffee/allProductPage.php';
                break;
            case 'contact':
                include './Pages/contact/contact.php';
                break;
            case 'about':
                include './Pages/about/about.php';
                break;
            case 'login':
                include './Pages/login/login.php';
                break;
            case 'cart':
                include './Pages/cart/cart.php';
                break;
                // default:
                //     include 'Lista.php';
                // case 'Modositasoldal':
                //     include 'Modositas.php';
                //     break;
        }
    } else {
        // include 'Lista.php';
    }
    ?>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>