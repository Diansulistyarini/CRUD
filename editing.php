<?php
include ('lib/connection.php');
$id = $_GET['kode'];

$hasil = $con->query("SELECT * FROM `barang` WHERE `kode`=$id");


    
    foreach($hasil as $data){
       
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Insert Barang</title>
</head>

    <style>

        .back{
            margin-left : 20px;
        }

        #button{
            margin-left : 10px;
        }

        .h1, h1 {
            font-size: 38px;
        }

        .h4, h4 {
            font-size: 18px;
            /* text-align: center; */
        }

        .table td, .table th {
            padding: .75rem;
            vertical-align: top;
            border-top: 0px solid;
        }

        .table{
            margin-top: 30px;
        }

        .text-left{
            margin-top: 40px;
            margin-left : 150px;
        }

    </style>

<body>
    
    <div class="container">
        <h1 class='text-left' >Edit Data Barang</h1>
            <form action="proses_edit.php" method ='POST'>
            <table class="table" align="center" border="0"> 

            <tr>
                <td>
                    <h4>Kode Produk</h4>
                </td>
                <td><input type="hidden" style="width: 300px" name="kode" value=<?php echo $data['kode']; ?>></input></td>
            </tr>
            <tr>

            <tr>
                <td>
                    <h4>Nama Produk</h4>
                </td>
                <td><input type="text" style="width: 300px" name="namaproduk" value=<?php echo $data['nama_produk']; ?>></input></td>
            </tr>
            <tr>
                <td>
                    <h4>Harga Produk</h4>
                </td>
                <td><input type="number" style="width: 300px" name="hargaproduk" value=<?php echo $data['harga_produk']; ?>></td>
            </tr>
            <tr>
                <td>
                    <h4>Satuan</h4>
                </td>
                <td><select name="satuan" style="width: 300px">
                    <option <?php if($data['satuan']=="null"){ echo "selected=selected";}?> value="null">Pilih satuan</option>
                    <option <?php if($data['satuan']=="pieces"){ echo "selected=selected";}?> value="pieces">Pieces</option>
                    <option <?php if($data['satuan']=="perbox"){ echo "selected=selected";}?>value="perbox">Perbox</option>
                    </select>
                </td>
            </tr>

            <tr>
                    <td>
                        <p>Gambar</p>
                    </td>
                    <td><input type="text" name="gambar" id="image" value=<?php echo $data['gambar']; ?>></td>
                </tr>

            <tr>
                <td>
                    <h4>Stock Barang</h4>
                </td>
                <td><input type="number" style="width: 300px" name="stok" value=<?php echo$data['stok']; ?>></td>
            </tr>
        </table>

        <table>
        <tr>
            <td>
                <input type='submit' class='btn btn-primary mt-4' name='submit' value = "Simpan" id="button">
            </td>
            <td>   
                <div class="back">
                    <a href="add.php"><input type='submit' class='btn btn-primary mt-4' name='submit' value = "Back"></a>
                </div>
            </td>
        </tr>
        </table>

            </form>
    <?php } ?>
    </div>
    

</body>
</html>