<?php

$servername = "localhost";
$usrname = "root";
$pass = "";
$dbname = "solidatabase";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $usrname, $pass);
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    

    //echo "Connected successfully.";
}catch(PDOException $e){
    echo "Error while connecting to database. " . $e->getMessage();
}
$conn = null;

?>