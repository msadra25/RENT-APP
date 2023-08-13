<?php
namespace Controllers\BaseController;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require_once './config.php';


class BaseController{
    public static function beforExecute($data){
        global $JWT_KEY;
        try{
            return JWT::decode($data["token"], new key($JWT_KEY, 'HS256'));
        }catch(Exception $e){
            return false;
        }
    }
}
