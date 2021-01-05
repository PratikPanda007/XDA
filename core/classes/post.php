<?php

class Post extends User {
    
    function __construct($pdo){
        //$pdo comes from users.php which takes the value of pdo from connection.php
        $this->pdo = $pdo;
    }
}


?>
