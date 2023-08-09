<?php

class Availability implements Model{
    
    public $id;
    public $carId;
    public $timeFrom;
    public $timeTo;
    public $pickupLoc;
    public $dropLoc;
    public $totalPay;
    public $description;

    public function save($key, $value)
    {
        
    }

    public function delete($key, $value)
    {
        
    }  
}