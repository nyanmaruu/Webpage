<?php
session_start();
require __DIR__ . '/../../Classes/ProfilePage/profilePage.php';
require __DIR__ . '/../../Querys/profilePageQuery.php/profilePageQuery.php';


class ProfileActions extends ProfilePageData
{
    public $querys;
    public $addressDatas;


    public function __construct()
    {
        $this->querys = new ProfilePageData;
        $data = $this->querys->getUserData();
        if (!empty($data)) {
            foreach ($data as $row) {
                $addressData = new profileData($row['address_id'], $row['name'], $row['email'], $row['address'], $row['city'], $row['zip_code'], $row['country']);
                $this->addressDatas[] = $addressData;
            }
        }
    }

    function getProducts()
    {
        return $this->addressDatas;
    }

    function userAddress()
    {
        $output = '';

        if (!empty($this->addressDatas)) {
            foreach ($this->addressDatas as $row) {
                $output .=

                    '
                    <div class="card">
                    <div class="row">
                        <div class="col-md-8 cart">
                            <div class="title">
                                <h1>' . $_SESSION["useruid"] . '</h1>
                                <div class="row">
                                    <div class="col">
                                        <a  onClick="setNewAddress()" class="btn">Set Address</a>
                                        <a onClick="searchResult()" class="btn col">Check Orders</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 summary">
                            <div>
                                <h5><b>Shipping Address</b></h5>
                            </div>
                            <hr>

                            <div class="row mb-5">
                            <div class="input-wrapper lg-half">
                                <label for="shipping-first-name">Name</label>
                                <input value="' . $row->getName() . '" disabled type="text" name="shipping-first-name" id="shipping-first-name" required>
                            </div>
                            <div class="input-wrapper lg-half">
                                <label for="shipping-last-name">Email</label>
                                <input  value="' . $row->getEmail() . '" disabled type="text" name="shipping-last-name" id="shipping-last-name" required>
                            </div>
                            <div class="input-wrapper lg-half">
                                <label for="shipping-street-address">Street Address</label>
                                <input  value="' . $row->getAddress() . '" disabled type="text" name="shipping-street-address" id="shipping-street-address" required>
                            </div>
                            <div class="input-wrapper lg-third">
                                <label for="shipping-apt-address">City</label>
                                <input  value="' . $row->getCity() . '" disabled type="text" name="shipping-apt-address" id="shipping-apt-address">
                            </div>
                            <div class="input-wrapper lg-half">
                                <label for="shipping-city">Country</label>
                                <input  value="' . $row->getCountry() . '" disabled type="text" name="shipping-city" id="shipping-city" required>
                            </div>
                            <div class="input-wrapper lg-third">
                                <label for="shipping-postal-code">Zip/Postal Code</label>
                                <input  value="' . $row->getZipCode() . '" disabled type="text" name="shipping-postal-code" id="shipping-postal-code" required>
                            </div>
            
                        </div>
                          
                        </div>
                    </div>
                </div>

                ';
            }
        } else {
            $output .=

                '
                <div class="card">
                <div class="row">
                    <div class="col-md-8 cart">
                        <div class="title">
                            <h1>' . $_SESSION["useruid"] . '</h1>
                            <div class="row">
                                <div class="col">
                                    <a  onClick="setNewAddress()" class="btn">Set Address</a>
                                    <a onClick="listOrders()" class="btn col">Check Orders</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 summary">
                        <div>
                            <h5><b>Shipping Address</b></h5>
                        </div>
                        <h2>Please Setup Your Address</h2>
                    </div>
                      
                    </div>
                </div>
            </div>

        ';
        }
        return $output;
    }

    function setAddress()
    {
        $output = '';


        $output .=

            '  <div class="card">
            <div class="row">
                <div class="col-md-8 cart">
                    <div class="title">
                        <h1>' . $_SESSION["useruid"] . '</h1>
                    </div>
                </div>
                <div class="col-md-4 summary">
                    <div>
                        <h5><b>Please fill in your Shipping Address!</b></h5>
                    </div>
                    <hr>
                    <form action="./Controller/profilePage/setProfileAddress.php" method="post">
                    <div class="row mb-5">
                    <div class="input-wrapper lg-half">
                        <label for="shipping-first-name">Name</label>
                        <input type="text" name="name"  required>
                    </div>
                    <div class="input-wrapper lg-half">
                        <label for="shipping-last-name">Email</label>
                        <input   type="text" name="email" required>
                    </div>
                    <div class="input-wrapper lg-half">
                        <label for="shipping-street-address">Street Address</label>
                        <input  type="text" name="address"  required>
                    </div>
                    <div class="input-wrapper lg-third">
                        <label for="shipping-apt-address">City</label>
                        <input   type="text" name="city"  required>
                    </div>
                    <div class="input-wrapper lg-half">
                        <label for="shipping-city">Country</label>
                        <input   type="text" name="country" required>
                    </div>
                    <div class="input-wrapper lg-third">
                        <label for="shipping-postal-code">Zip/Postal Code</label>
                        <input  type="number" name="zipcode"  required>
                    </div>
                    <button class="AccountBtn btn" type="submit" name="submit">Save</button>
                </form>
                </div>
                  
                </div>
            </div>
        </div>

              ';

        return $output;
    }




    function userDataForCheckout()
    {
        $output = '';

        if (!empty($this->addressDatas)) {
            foreach ($this->addressDatas as $row) {
                $output .=

                    '
 <form id="addressForm" action="./Controller/Checkout/checkoutController.php" method="post">
    <div class="input-box">
        <input value="' . $row->getName() . '" type="text" name="name">
    </div>
    <div class="input-box">
        <input  value="' . $row->getEmail() . '"  name="email">
    </div>
    <div class="input-box">
        <input  value="' . $row->getAddress() . '" name="address">
    </div>
    <div class="input-box">
        <input  value="' . $row->getCity() . '" type="text" name="city">
    </div>
    <div class="input-box">
        <input value="' . $row->getZipCode() . '" type="text" name="zipcode">
    </div>
    <div class="input-box">
        <input value="' . $row->getCountry() . '" type="text" name="country">
    </div>
    
</form>
                 
<select>
    <option class="text-muted">Free Delivery</option>
</select>
<p>GIVE CODE</p>
<input id="code" placeholder="Enter your code">
<div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
    <div class="col">TOTAL PRICE</div>
    <div class="subtotal col text-right"></div>
</div>
<button form="addressForm" type="submit" name="submit" class="btnCheckout btn">CHECKOUT</button>
                ';
            }
        } else if (!isset($_SESSION["address_id"]) && isset($_SESSION["userid"])) {
            $output .=

                '
                <select>
                <option class="text-muted">Free Delivery</option>
            </select>
            <p>GIVE CODE</p>
            <input id="code" placeholder="Enter your code">
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">TOTAL PRICE</div>
                <div class="subtotal col text-right"></div>
            </div>
            <a href="http://localhost/webpage/?oldal=profilePage" name="submit" class="btn" >Please set your address in the profile page</a>
             

        ';
        } else {
            $output .=

                '
            <select>
            <option class="text-muted">Free Delivery</option>
        </select>
        <p>GIVE CODE</p>
        <input id="code" placeholder="Enter your code">
        <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
            <div class="col">TOTAL PRICE</div>
            <div class="subtotal col text-right"></div>
        </div>
        <a href="http://localhost/webpage/?oldal=login" name="submit" class="btn" >Please login to continue</a>
         

    ';
        }
        return $output;
    }


    function listOrders()
    {
        $output = '';
        $dateUserOrders =  $this->querys->getOrderDatas();
        if (!empty($dateUserOrders)) {
            $output .=  '
           
            <!-- admin panel cards end -->
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>Orders</b></h2>
                        </div>
                        <div class="col-sm-6">
                           
                            <a href="http://localhost/webpage/?oldal=profilePage" class="btn"><i class="fas fa-arrow-left"></i> <span>Back</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                            </th>
                            <th>Order Time</th>
                            <th>Product and Quantity</th>
                            <th>Address</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
            ';

            foreach ($dateUserOrders as $row) {
                $output .=

                    '
                                    <tbody>
                                    <tr>
                                    <td>
                                        <span class="custom-checkbox">
                                        </span>
                                    </td>
                                    <td>' . $row["createdAtDate"] . '</td>
                                    <td>' . $row["ordered_products"] . '</td>
                                    <td>' . $row["address"] . '</td>
                                    <td>' . $row["total_ordered_price"] . ' $</td>
                
                                    <td>
                                        <a><i class="fas fa-shipping-fast"></i>Recieved Order</a>
                                    </td>
                                </tr>
                                    </tbody>
                ';
            }

            $output .=  '
            </table>
                
            </div>
        </div>
    </div>        ';
        } else {
            $output .=  '
           
            <!-- admin panel cards end -->
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>Orders</b></h2>
                        </div>
                        <div class="col-sm-6">
                           
                            <a href="http://localhost/webpage/?oldal=profilePage" class="btn"><i class="fas fa-arrow-left"></i> <span>Back</span></a>
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
                    
                    <tbody>
                    <tr>
                    <td>
                        <span class="custom-checkbox">
                        </span>
                    </td>
                    <td>There is no orders yet!</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                    </tbody>
                    </table>
                
            </div>
        </div>
    </div>    
            ';
        }

        return $output;
    }
}
