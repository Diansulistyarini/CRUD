<?php

try {
    $con = new PDO("mysql:host=localhost;dbname=test1","root","");
    // echo "Database Terhubung";
    //INSERT INTO `food` (`kd_menu`, `nama_produk`, `harga_produk`, `satuan`, `stok`) 
    //VALUES (NULL, 'Masker', '5000', 'pcs', '100');
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>