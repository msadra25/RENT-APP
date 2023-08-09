<?php

class User implements Model{

    private $username; 
    private $password;
    private $firstName; 
    private $lastName; 
    private $id;  
    private $birthDate; 
    private $phone; 
    private $landline;
    private $fatherName; 
    private $pic; 
    private $idCardPic; 
    private $address; 
    private $accountNumber; 
    private $drivingLicenceId; 
    private $drivingLicenceExp; 
    private $drivingLicencePic; 
    private $email; 
    private $confirmCode; 
    
    public function save($key, $value)
    {
        
    }

    public function delete($key, $value)
    {
        
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}

