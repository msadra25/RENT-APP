<?php

class Car implements Model{

    private $userId; 
    private $id; 
    public $brand; 
    public $model; 
    public $year; 
    public $Price; 
    public $color; 
    public $plateNumber; 
    public $insurancePic; 
    public $insuranceExp;  
    public $performance; 
    public $gearbox; 
    public $seats; 
    public $fuel; 
    public $fuelConsumption; 
    public $frontPic; 
    public $backPic; 
    public $rightPic; 
    public $leftPic; 
    public $insidePic; 
    public $trunkPic; 
    private $location; 

    public function save($key, $value)
    {
        
    }

    public function delete($key, $value)
    {
        
    }
}