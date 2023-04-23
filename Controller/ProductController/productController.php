<?php
require_once __DIR__ . '/../../Classes/Product/ProductActions.php';

$productActions = new ProductActions();

if (isset($_POST["action"]) && $_POST["action"] == "getAllCoffee") {
  echo $productActions->allProductsHtmlText();
}
