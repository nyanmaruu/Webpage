<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Shopping Cart</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Shopping Cart</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Product 1</td>
                    <td>$10</td>
                    <td>
                        <input type="number" value="1" min="1">
                    </td>
                    <td>$10</td>
                </tr>
                <tr>
                    <td>Product 2</td>
                    <td>$20</td>
                    <td>
                        <input type="number" value="1" min="1">
                    </td>
                    <td>$20</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Total</td>
                    <td>$30</td>
                </tr>
            </tfoot>
        </table>
        <div class="text-center">
            <button class="btn btn-primary">Checkout</button>
        </div>
    </div>