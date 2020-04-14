<?php
    include('lib/connection.php');

    $id = $_POST['kode'];
    $nama = $_POST['nama_produk'];
    $har = $_POST['harga_produk'];
    $st = $_POST['satuan'];
    $stk = $_POST['stok'];
    $url = $_POST['gambar'];

    $sql = $con->query("UPDATE `barang` SET `nama_produk` = '$nama', `harga_produk` = '$har', `satuan` = '$st', `stok` = '$stk', `gambar` = '$url' WHERE `barang`.`kode` = '$id';");

    if($sql == TRUE){
        echo "Data Berhasil di Update";
        header("location:adding.php");
    }else{
        echo "Data Gagal Diupdate";
    }


?>