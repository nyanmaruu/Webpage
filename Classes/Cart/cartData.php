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
        if (!empty($cartData)) {


            $output .= '
        <table class="table table-image">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="">Name</th>
                <th scope="col">Qty</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        ';

            foreach ($cartData as $row) {
                $output .=

                    '
           
           
            <tbody>
                <tr>
                    <td class="w-25">
                        <img src="' . $row['pictures'] . '" class="img-fluid" alt="product">
                    </td>
                    <td>' . $row["name"] . '</td>
                    <td class="qty"><p id="input1" >' . $row['quantity'] . '</p></td>
                    <td>' . $row['price'] . '$</td>
                    <td>
                   <b class="removeItemFromCheckout p-5" onClick="removeFromCart(' . $row['id'] . ')" ><i class="fas fa-trash"></i></b>
                    </td>
                </tr>
            </tbody>
           
            

      ';
            }
            $output .= ' </table>';
        }
        echo $output;
    }

    function checkDataForDb()
    {
        $output = '';
        $cartData = $this->cartClass->getCartSession();



        foreach ($cartData as $row) {
            $output .=

                '
                <tr>
                    <td>' . $row["name"] . '</td>
                    <td>' . $row['quantity'] . '</td>
                    <td class="qty">' . $row['price'] .  '$</td>
                </tr>
           
      ';
        }
        echo $output;
    }



    function dataOfCartCheckout()
    {
        $output = '';
        $cartData = $this->cartClass->getCartSession();



        foreach ($cartData as $row) {
            $output .=
                '
                <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid" src=' . $row["pictures"] . '></div>
                    <div class="col">
                        <div class="row">' . $row["name"] . '</div>
                    </div>
                    <div class="col">
                       <a href="#" class="border">' . $row['quantity'] . '</a>
                    </div>
                    <div class="col">' . $row['price'] .  '$<b class="removeItemFromCheckout p-5" onClick="removeFromCheckout(' . $row['id'] . ')" ><i class="fas fa-trash"></i></b></div>
                    
                </div>
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

        $output .=
            '
    <table class="table table-image">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="">Name</th>
            <th scope="col">Qty</th>
            <th scope="col">Total</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>

    ';


        foreach ($cart as $row) {
            $output .=

                '
         
           
                <tbody>
                    <tr>
                        <td class="w-25">
                            <img src="' . $row['pictures'] . '" class="img-fluid" alt="product">
                        </td>
                        <td>' . $row["name"] . '</td>
                        <td class="qty"><p id="input1" >' . $row['quantity'] . '</p></td>
                        <td>' . $row['price'] . '$</td>
                        <td>
                       <b class="removeItemFromCheckout p-5" onClick="removeFromCart(' . $row['id'] . ')" ><i class="fas fa-trash"></i></b>
                        </td>
                    </tr>
                    </tbody>
              
                

      ';
        }
        $output .= '
       
        </table>';
        echo $output;
    }

    function removeCheckoutSess()
    {

        $output = '';




        $cart = $this->cartClass->removeProductSession($_POST['id']);


        foreach ($cart as $row) {
            $output .=
                '
         
                <div class="row border-top border-bottom">
                <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid" src=' . $row["pictures"] . '></div>
                    <div class="col">
                        <div class="row">' . $row["name"] . '</div>
                    </div>
                    <div class="col">
                        <a href="#">-</a><a href="#" class="border">' . $row['quantity'] . '</a><a href="#">+</a>
                    </div>
                    <div class="col">' . $row['price'] .  '$<b onClick="removeFromCheckout(' . $row['id'] . ')"><i class="fas fa-trash"></i></b>
                </div>
            </div>


      ';
        }
        echo $output;
    }

    function removeCartSess()
    {
        $cart = $this->cartClass->removeProductSession($_POST['id']);
        $output = '';
        $output .=
            '
        <table class="table table-image">
        <thead>
            <tr>
                <th scope="">Name</th>
                <th scope="col">Qty</th>
                <th scope="col">Total</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>

        ';
        foreach ($cart as $row) {
            $output .=
                '
            <tbody>
                <tr>
                    <td class="w-25">
                        <img src="' . $row['pictures'] . '" class="img-fluid img-thumbnail" alt="#">
                    </td>
                    <td>' . $row["name"] . '</td>
                    <td>' . $row['price'] . '$</td>
                    <td class="qty"><p id="input1" >' . $row['quantity'] . '</p></td>
                    <td>Fejlesztés alatt $</td>
                    <td>
                        <button onClick="removeFromCart(' . $row['id'] . ')" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                </tbody>

      ';
        }

        $output .= '
        </table>
        ';

        echo $output;
    }

    function getSubtotal()
    {
        $output = '';

        $getSubTotal = $this->cartClass->getSubtotal();
        if (!empty($getSubTotal)) {
            $output .=
                '
    <h5 class="price d-flex" >Total:<p class="text-success">' . $getSubTotal . '$</p></h5>
';
        } else {
            $output .=
                '
    
';
        }


        echo $output;
    }

    function getTotalItemsNumber()
    {
        $output = '';

        $itemsNumber = $this->cartClass->getItemsNumber();

        $output .=
            '
         
           <p id="cartValue">' . $itemsNumber . '</p>

      ';

        echo $output;
    }

    function itemsNumberCartModal()
    {
        $output = '';

        $itemsNumber = $this->cartClass->getItemsNumber();
        if (empty($itemsNumber)) {
            $output .=

                '<span class=" right-0 start-100 translate-middle badge rounded-pill ">
      </span>';
        } else {
            $output .=
                '
            <span class=" right-0 start-100 translate-middle badge rounded-pill bg-danger">
            ' . $itemsNumber . '
        </span>
      ';
        }
        echo $output;
    }
}
