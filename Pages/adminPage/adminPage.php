<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="CSS/adminPage.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>

<body>

    <main style="margin-top: 58px">
        <div class="container pt-4"></div>
    </main>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4 col-xl-6">
                <div class="card bg-c-blue order-card py-7">
                    <div class="card-block">
                        <h5 class="m-b-20">Orders Received</h5>
                        <h2 class="text-right">
                            <i class="fa fa-cart-plus f-left"></i>
                            <span id="displayOrdersNumber">
                            </span>
                        </h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xl-6">
                <div class="card bg-c-green order-card py-7">
                    <div class="card-block">
                        <h5 class="m-b-20">All user</h5>
                        <h2 class="text-right">
                            <i class="fa fa-users f-left"></i>
                            <span id="displayUsersNumber">

                            </span>
                        </h2>

                    </div>
                </div>
            </div>



        </div>
    </div>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>Orders</b></h2>
                        </div>
                        <div class="col-sm-6">

                            <a href="./Controller/AccountManagmentInculudes/logoutInc.php" class="btn"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                            </th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="ordersResult">

                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <script src="./Js/adminPage/adminPage.js"></script>

</body>

</html>