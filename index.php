<?php

declare(strict_types=1);
require __DIR__ . '/vendor/autoload.php';
require_once 'Models/Model.php';
require_once 'Controllers/UserController.php';

// use Models;
// use Controllers;
// use Controllers\UserController;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Models\User;


$path = $_GET["path"];
header('Content-Type: application/json; charset=utf-8');
$json = file_get_contents('php://input');
$data = json_decode($json);

$dbh = new PDO("mysql:host=mysql;dbname=RENT_APP", "root", "1234");

if(strcmp($path,"register")== 0){
    echo json_encode(UserController::register($data));
}elseif(strcmp($path,"login")== 0){
    echo json_encode(UserController::login($data));
}


?>