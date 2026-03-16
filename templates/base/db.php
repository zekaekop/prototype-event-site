<?php

$host = "localhost";
$dbname = "CAS";
$user = "root";
$pwd = "";

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pwd);
    $pdo -> Attribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    die("LOST CONNECTION DB ". $e->getMessage());
}
?>