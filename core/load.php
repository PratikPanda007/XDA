<?php

include 'database/connection.php';
include 'classes/users.php';
include 'classes/post.php';
include 'connect/DB.php';

global $pdo;

//Class Objects
$loadFromUser = new User($pdo);
$loadFromPost = new Post($pdo);

define("BASE_URL", "http://localhost/1541012386/XDA");


?>
