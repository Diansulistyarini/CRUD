<?php

try {
    $con = new PDO("mysql:host=localhost;dbname=test1","root","");
    // echo "Database Terhubung";
    
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>
