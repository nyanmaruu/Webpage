<?php
session_start();
require __DIR__ . '/../../Classes/Product/Product.php';
require __DIR__ . '/../../Querys/coffeesPage/allcoffeeQuery.php';


class ProductActions extends AllProducts
{
  public $querys;
  public $products;


  public function __construct()
  {
    $this->querys = new AllProducts;
    $data = $this->querys->getAllData();
    foreach ($data as $row) {
      $product = new Product($row['id'], $row['pictures'], $row['name'], $row['description'], $row['price'], $row['short_introduction']);
      $this->products[] = $product;
    }
  }

  function getProducts()
  {
    return $this->products;
  }

  function allProductsHtmlText()
  {
    $output = '';
    foreach ($this->products as $row) {
      $output .=

        '
        
            <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-5">
            <div class="card productDisplay" onClick="oneCoffees(' . $row->getId() . ')">
                <div class="card-header" >
             
                 <img class="card-image "src="' . $row->getImage() . '" alt="' . $row->getName() . '" />
                 
                </div>
                <div class="card-body">
                    <p>' . $row->getName() . '</p>
                    <hr>
                    <div>
                    <p>' . $row->getPrice() . ' $</p>
                    </div>
                </div>  
            </div>
            </div>
            ';
    }
    return $output;
  }

  function oneProductsHtmlText()
  {
    $output = '';
    $data = $this->querys->getOneProduct($_POST['id']);



    foreach ($data as $row) {
      $output .=
        '
      <div class="container containerOneProd ">
      <div class="row">   
          <div class="col-sm-12 col-md-8 col-lg-6 justify-content-center d-flex">
              <img id="oneProdImg" src="' . $row['pictures'] . '" alt="' . $row["name"] . '" "/>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-4 mt-5">
                <p class="product-name" >' . $row["name"] . '</p>
                <p class="product-price" >' . $row["price"] . ' $</p>
              <div class="row col-6 mt-5">
                    <div class="btn-group" role="group" aria-label="Basic outlined example">

                      <button  type="button" class="btn rounded-0 " onclick="decreaseValue()">-</button>
                      <input id="inputQty" type="text" class="btn rounded-0" min="1" value="1" disabled></input>
                      <button type="button" class="btn rounded-0" onclick="increaseValue()">+</button>

                    </div>

                    
                      
              </div>

              <div class="col-12 mt-5 " >
                      <a onCLick="coffees()"  class=" back-btn btn btn-sm" >Back</a>
                      <button onClick="addToCartModal(' . $row['id'] . ')" type="button" class="btn btn-sm">Add to cart</button>
              </div>

                  <div class="row mt-5 my-5">
                    <p class="product-description" >' . $row["description"] . '</p>
                  </div>
                  
              </div>
              
      </div>
  </div>
</div>
     
            ';
    }
    return $output;
  }
}
