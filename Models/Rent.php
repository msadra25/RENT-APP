<?php

class Rent implements Model{

    private $id;  
    private $carId; 
    private $userId;  
    private $timeFrom; 
    private $timeTo; 
    private $delay; 
    private $damage; 
    private $payMethod; 
    private $payStatus; 
    private $discountCode; 
    private $status;
    
    public function save($key, $value)
    {
        
    }

    public function delete($key, $value)
    {
        
    }
}