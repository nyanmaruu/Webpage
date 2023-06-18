<?php
session_start();
require __DIR__ . '/../../Classes/Cart/Cart.php';
require_once __DIR__ . '/../../Querys/Cart/cartQuery.php';

class CartData extends Cart
{
    public $querysData;
    public $cartClass;

    public function __construct()
    {
        $this->querysData = new Cart;
        $this->cartClass = new Session_Cart;
    }



    function dataOfCart()
    {
        $output = '';
        $cartData = $this->cartClass->getCartSession();



        foreach ($cartData as $row) {
            $output .=

                '
         
           
            <table class="table table-image">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Total</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="w-25">
                        <img src="' . $row['pictures'] . '" class="img-fluid img-thumbnail" alt="#">
                    </td>
                    <td>' . $row["name"] . '</td>
                    <td>' . $row['price'] . '$</td>
                    <td class="qty"><input type="text" class="form-control" id="input1" value="' . $row['quantity'] . '"></td>
                    <td>Fejlesztés alatt $</td>
                    <td>
                        <button onClick="removeFromCart(' . $row['id'] . ')" class="btn btn-danger btn-sm">
                        
                            <i class="fa fa-times"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
            </table>
            </div>

      ';
        }
        echo $output;
    }



    function addToCart()
    {

        $output = '';
        $product = $this->querysData->cartData($_POST['id']);


        $this->cartClass->setCartSession($product, $_POST["qty"]);
        $cart = $this->cartClass->getCartSession();


        foreach ($cart as $row) {
            $output .=

                '
         
           
            <table class="table table-image">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Total</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="w-25">
                        <img src="' . $row['pictures'] . '" class="img-fluid img-thumbnail" alt="#">
                    </td>
                    <td>' . $row["name"] . '</td>
                    <td>' . $row['price'] . '$</td>
                    <td class="qty"><input type="text" class="form-control" id="input1" value="' . $row['quantity'] . '"></td>
                    <td>Fejlesztés alatt $</td>
                    <td>
                        <button  onClick="removeFromCart(' . $row['id'] . ')" class="btn btn-danger btn-sm">
                        
                            <i class="fa fa-times"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
            </table>
            </div>

      ';
        }
        echo $output;
    }

    function removeCartSess()
    {

        $output = '';




        $cart = $this->cartClass->removeProductSession($_POST['id']);


        foreach ($cart as $row) {
            $output .=
                '
         
           
            <table class="table table-image">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Total</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="w-25">
                        <img src="' . $row['pictures'] . '" class="img-fluid img-thumbnail" alt="#">
                    </td>
                    <td>' . $row["name"] . '</td>
                    <td>' . $row['price'] . '$</td>
                    <td class="qty"><input type="text" class="form-control" id="input1" value="' . $row['quantity'] . '"></td>
                    <td>Fejlesztés alatt $</td>
                    <td>
                        <button onClick="removeFromCart(' . $row['id'] . ')" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
            </table>
            </div>

      ';
        }
        echo $output;
    }

    function getSubtotal()
    {
        $output = '';

        $subtotal = $this->cartClass->getSubtotal();

        $output .=
            '
         
           Subtotal:' . $subtotal . '$

      ';

        echo $output;
    }
}
