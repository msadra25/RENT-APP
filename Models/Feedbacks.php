<?php

class Feedbacks implements Model{

    public $userId; 
    public $carId; 
    public $rentId; 
    public $time; 
    public $cleanliness; 
    public $onTimeDrop;
    public $onTimePickup;
    public $ownerInteractoin;
    public $customerInteraction;
    public $matchingInformation;

    public function save($key, $value)
    {
        
    }

    public function delete($key, $value)
    {
        
    }
}