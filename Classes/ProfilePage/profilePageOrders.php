<?php
class OrdersData
{
    public $user_id;
    public $name;
    public $product_id;
    public $quantity;
    public $total_price;
    public $created_at;



    public function __construct($user_id,  $name, $product_id, $quantity,  $total_price, $created_at)
    {
        $this->user_id = $user_id;
        $this->name = $name;
        $this->product_id = $product_id;
        $this->created_at = $created_at;
        $this->quantity = $quantity;
        $this->total_price = $total_price;
    }

    public function getId()
    {
        return $this->user_id;
    }
    public function getName()
    {
        return $this->name;
    }

    public function getProductId()
    {
        return $this->product_id;
    }

    public function getQty()
    {
        return $this->quantity;
    }

    public function getTotalPrice()
    {
        return $this->total_price;
    }
    public function getCreatedAt()
    {
        return $this->created_at;
    }
}
