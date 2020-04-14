<?php

include('lib/connection.php');
$kode = $_POST['kode'];
$nama_produk = $_POST['nama_produk'];
$harga_produk = $_POST['harga_produk'];
$satuan = $_POST['satuan'];
$stock = $_POST['stok'];
$url = $_POST['gambar'];
print_r($_POST);

$result = $con->exec("INSERT INTO `barang` (`kode`, `nama_produk`, `harga_produk`, `satuan`, `stok`, `gambar`) VALUES ('$kode', '$nama_produk', '$harga_produk', '$satuan', '$stock', '$url');");
echo $result;

if ($result == TRUE) {
    echo "Data Tersimpan Ke Database";
    header("location:adding.php");
} else {
    echo "Data Gagal Tersimpan";
}
