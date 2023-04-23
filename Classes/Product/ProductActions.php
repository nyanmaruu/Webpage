<?php
require __DIR__ . '/../../Classes/Product/Product.php';
require __DIR__ . '/../../Querys/coffeesPage/allcoffeeQuery.php';


class ProductActions extends Querys
{
  public $querys;
  public $products;


  public function __construct()
  {
    $this->querys = new Querys;
    $data = $this->querys->getAllData();
    foreach ($data as $row) {
      $product = new Product($row['pictures'], $row['name'], $row['description'], $row['price'], $row['short_introduction']);
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

      
       
        <div class="card col-12 col-md-12 col-lg-3 col-xl-3 my-5 mx-5 ">
          <div>
            <img  src="' . $row->getImage() . '"  alt="coffees">
          </div>
          <div>
            <div class="card-body">
              <h2 class="card-title">' . $row->getName() . '</h2>
              <p class="card-text">' . $row->getPrice() . '$</p>
              </div>
              </div>
              <div class="card-body">
              <a href="#" class="btn addToCartBtn">Add To Cart</a>
              </div>
            </div>
      
   
      
                ';
    }
    return $output;
  }
}
