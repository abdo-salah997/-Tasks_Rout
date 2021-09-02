<?php

$server = "localhost";
$useName = "root";
$password = "";
$dbName = "project2";


try{
    $cont = new PDO("mysql:host=$server;dbname=$dbName",$useName,$password);
}
catch(PDOException $e)
{
    echo "Erorr : ". $e->getMessage();
}