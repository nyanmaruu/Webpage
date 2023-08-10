<?php
class profileData
{
    public $address_id;
    public $user_id;
    public $name;
    public $email;
    public $address;
    public $city;
    public $zip_code;
    public $country;



    public function __construct($address_id,  $name, $email, $address, $city, $zip_code, $country)
    {
        $this->address_id = $address_id;
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
        $this->city = $city;
        $this->zip_code = $zip_code;
        $this->country = $country;
    }

    public function getId()
    {
        return $this->address_id;
    }
    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getCity()
    {
        return $this->city;
    }
    public function getZipCode()
    {
        return $this->zip_code;
    }
    public function getCountry()
    {
        return $this->country;
    }
}
