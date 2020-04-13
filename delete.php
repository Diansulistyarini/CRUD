<?php
include ('lib/connection.php');
$id =$_GET['kode'];
$result = $con->query("DELETE FROM `barang` WHERE `barang`.`kode` = $id");

if ($result==TRUE) {
    echo "Data Berhasil di Hapus";
    header("location:adding.php?info=hapus");
}else{
    echo "Data Gagal di hapus";
}

?>