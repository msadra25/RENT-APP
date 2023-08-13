<?php
namespace Controllers\UserController;
require 'Models/User.php';
require_once 'BaseController.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Controllers\BaseController\BaseController as BaseController;
require_once './config.php';


class UserController extends BaseController{

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
        global $JWT_KEY;
        global $APP_NAME;
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
                $date = new \DateTimeImmutable();
                $expire_at = $date->modify('+3600 minutes')->getTimestamp();      // Add 60 seconds
                $username = $data->Username;                                           // Retrieved from filtered POST data
                $payload = [
                    'iat'  => $date->getTimestamp(),         // Issued at: time when the token was generated
                    'iss'  => $APP_NAME,                       // Issuer
                    'nbf'  => $date->getTimestamp(),         // Not before
                    'exp'  => $expire_at,                           // Expire
                    'userName' => $username,
                ];
                $jwt = JWT::encode($payload, $JWT_KEY, 'HS256');
                return ["status" => true,
                "token" => $jwt];

            }else{
                return ["status"=>false,
                "message" => "password is incorrect"];
            }
        }
    }

    public static function forgetPassword($data){
        //TODO

    }

    public static function sendVerificationCode(){

    }

    public static function verifyCode(){

    }
    public static function test($data, $headers){
        $result = UserController::beforExecute($headers);
        if($result){
            return $data;
        }else{
            return [
                "status" => false,
                "message" => "Unauthorized!"
            ];
        }
    }
}