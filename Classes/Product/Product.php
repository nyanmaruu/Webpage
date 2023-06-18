<?php
class Product
{
    public $id;
    public $image;
    public $name;
    public $description;
    public $price;
    public $short_introduction;


    public function __construct($id, $image, $name, $description, $price, $short_introduction)
    {
        $this->id = $id;
        $this->image = $image;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->short_introduction = $short_introduction;
    }

    public function getId()
    {
        return $this->id;
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
