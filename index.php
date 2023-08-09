<?php



$dbh = new PDO("mysql:host=mysql;dbname=RENT_APP", "root", "1234");

$sql = 'DROP TABLE Customers;';

$sth = $dbh->prepare($sql);
$sth->execute();


?>