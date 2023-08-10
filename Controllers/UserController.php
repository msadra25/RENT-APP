<?php
namespace Controllers;
require 'Models/User.php';
include '../dbConnection.php';


class UserController{

    public static function register($data){
        if($data->password == $data->confirmPas){
            continue;
        }else{
            echo "check your password ";
        }
        global $dbh;
        $sql = 'SELECT * From User WHERE Username = ';
        $sth = $dbh->prepare($sql);
        $sth->execute();

        
    }
    public static function login($username, $password){

    }


}