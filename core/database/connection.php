<?php
    
$hostDetails = 'mysql:host=127.0.0.1; dbname=xda; charset=utf8mb4';
$userAdmin = 'root';
$pass = '';

try{
    $pdo = new PDO($hostDetails, $userAdmin, $pass);
}catch(PDOException $e){
    echo 'Connection ERROR!'.$e->getMessage();
}


?>
