<?php
// namespace Controllers;
require 'Models/User.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


class UserController{

    public static function register($data){
        global $dbh;

        $username = $data->Username;
        $password = password_hash($data->Password, PASSWORD_DEFAULT);
        $firstName = $data->FirstName;
        $lastName = $data->LastName;
        $sql = "SELECT * FROM User WHERE Username = '$username';";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();

        if($result != NULL){
            return ["status" => false,
                    "massage" => "the username exists"];  

        }else{
            $sql = "INSERT INTO User (Username, Password, FirstName, LastName)
            VALUES ('$username', '$password', '$firstName', '$lastName');";
            $sth = $dbh->prepare($sql);
            $sth->execute();
            return ["status" => true,
                    "massage" => "user registered"];
        }
    } 
    

    public static function login($data){
        global $dbh;
        $username = $data->Username;
        $password = $data->Password;
        $sql = "SELECT * FROM User WHERE Username = :username";
        $sth = $dbh->prepare($sql);
        $sth->execute(["username" => $username]);
        $result = $sth->fetchAll();
        if(count($result) == 0){
            return ["status"=>false,
                "message" => "user not found"];
        }else{
            $verify = password_verify($password, $result[0]['Password']);
            if($verify == true){
                $key = '68V0zWFrS72GbpPreidkQFLfj4v9m3Ti+DXc8OB0gcM=';
                $date = new DateTimeImmutable();
                $expire_at = $date->modify('+6 minutes')->getTimestamp();      // Add 60 seconds
                $domainName = "RENT_APP";
                $username = $data->Username;                                           // Retrieved from filtered POST data
                $payload = [
                    'iat'  => $date->getTimestamp(),         // Issued at: time when the token was generated
                    'iss'  => $domainName,                       // Issuer
                    'nbf'  => $date->getTimestamp(),         // Not before
                    'exp'  => $expire_at,                           // Expire
                    'userName' => $username,
                ];
                $jwt = JWT::encode($payload, $key, 'HS256');
                return ["status" => true,
                "token" => $jwt];

            }else{
                return ["status"=>false,
                "message" => "password is incorrect"];
            }
        }
    }

    public static function forgetPassword($data){


    }

    public static function sendVerificationCode(){

    }

    public static function verifyCode(){
        
    }
}