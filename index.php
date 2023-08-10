<?php

use Models;
use Controllers;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require_once('../vendor/autoload.php');
declare(strict_types=1);

$dbh = new PDO("mysql:host=mysql;dbname=RENT_APP", "root", "1234");

// $sql = 'DROP TABLE Customers;';

// $sth = $dbh->prepare($sql);
// $sth->execute();

//$hasValidCredentials = true;
$json = file_get_contents('php://input');
$data = json_decode($json);



// $key = '68V0zWFrS72GbpPreidkQFLfj4v9m3Ti+DXc8OB0gcM=';
// $date = new DateTimeImmutable();
// $expire_at = $date->modify('+6 minutes')->getTimestamp();      // Add 60 seconds
// $domainName = "RENT_APP";
// $username = "mskh";                                           // Retrieved from filtered POST data
// $playload = [
//     'iat'  => $date->getTimestamp(),         // Issued at: time when the token was generated
//     'iss'  => $domainName,                       // Issuer
//     'nbf'  => $date->getTimestamp(),         // Not before
//     'exp'  => $expire_at,                           // Expire
//     'userName' => $username,                     // User name
// ];


?>