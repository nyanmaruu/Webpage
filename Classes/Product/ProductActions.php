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
            <div class="col-6 col-md-4 col-lg-3 mb-4 product">
            <div class="card mt-5">
                <div class="card-header border-0" >
                <a  onClick="oneCoffees(' . $row->getId() . ')">
                 <img class="card-image  h-200 border-0 "src="' . $row->getImage() . '" alt="' . $row->getName() . '" />
                 </a>
                </div>
                <div class="card-body">
                    <p class="border-0">' . $row->getName() . '</p>
                    <div class="card-footer">
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
  <div class="productContainer">
		<div class="row justify-content-center">
			<div class="col-md-8 bg-white rounded p-4">
				<div class="row">
					<div class="col-md-4 mb-4 mb-md-0">
						<img class="product-image img-fluid rounded" src="' . $row['pictures'] . '" alt="Product Image">
					</div>
					<div class="col-md-8">
						<h1 class="product-name">' . $row['name'] . '</h1>
						<p class="product-description" >' . $row['description'] . '</p>
						<p class="product-price h4">Price: ' . $row['price'] . '$</p>
						<div class="input-group mb-3 ">
						  	<button onClick="decreaseValue()"  class="minus-btn btn " type="button">-</button>
						  	<input type="number" name="qty" class="product-quantity" id="inputQty" value="1" min="1" max="10" readonly>
						  	<button onClick="increaseValue()" class="plus-btn btn " type="button">+</button>
						</div>
						<button onClick="addToCartModal(' . $row['id'] . ')" class="add-to-cart-btn btn ">Add to Cart</button>
						<a onCLick="coffees()" class="back-btn btn ">Back</a>
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


//mvc = model -> view -> controller