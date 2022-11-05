<?php

//A database connection has been established in this area.

try {
    $db = new PDO("mysql:host=localhost;dbname=productlist;charset=utf8","root","");
} catch (PDOException $e){
    echo $e->getMessage();
    
}


?>