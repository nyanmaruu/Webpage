<?php

class Product
{
    public $image;
    public $name;
    public $description;
    public $price;
    public $short_introduction;


    public function __construct($image, $name, $description, $price, $short_introduction)
    {
        $this->image = $image;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->short_introduction = $short_introduction;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getShortDesc()
    {
        return $this->short_introduction;
    }
}
