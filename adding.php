<?php
include('lib/connection.php');
$sql = $con->query("SELECT MAX(`kode`) AS kd FROM barang");
$sql->execute();
$hasil = $sql->fetch();
$kode = $hasil['kd'];

$noUrut = (int) substr($kode, 3);
$noUrut++;

$char = "MD-";
$newKD = $char.sprintf("%03s", $noUrut);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Input</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
        }

        .kotak {
            border: solid black;
            width: 400px;
            margin-left: 470px;
            padding-bottom: 40px;

        }

        #form {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .detail {
            margin-top: 60px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .myTable {
            counter-reset: rowNumber;
        }

        .myTable tbody tr {
            counter-increment: rowNumber;
            content: "MD-001"counter(rowNumber);
        }

        .myTable tbody tr td:first-child::before {
            content: counter(rowNumber);
            min-width: 1em;
            margin-right: 0.5em;
        }

        .warna {
            background: red;
            color: white;
        }
    </style>
</head>

<body>
    <form action="proses_add.php" method='POST'>
        <h1 style="text-align: center">Form Input Data Barang</h1>

        <div class="kotak" id="form">
            <table id="formMaster" class="formmstr">
                <tr>
                    <td width="100">
                        <p>Kode Produk</p>
                    </td>
                    <td><input type="text" name="kode" value="<?php echo $newKD;?>" readonly>
                        <span id="labelID" class="kode"></span>
                    </td>
                </tr>

                <!-- input nama produk -->
                <tr>
                    <td width="100">
                        <p>Nama Produk</p>
                    </td>
                    <td><input type="text" name="nama_produk" id="nmProduk"></td>
                </tr>

                <!-- input harga produk -->
                <tr>
                    <td width="100">
                        <p>Harga</p>
                    </td>
                    <td><input type="text" name="harga_produk" id="hrg"></td>
                </tr>

                <!-- input satuan produk -->
                <tr>
                    <td>
                        <p>Satuan</p>
                    </td>
                    <td><select name="satuan" id="stn">
                            <option value="null">Pilih satuan</option>
                            <option value="pieces">Pieces</option>
                            <option value="perbox">Perbox</option>
                        </select>
                    </td>
                </tr>

                <!-- input stok barang -->
                <tr>
                    <td width="100">
                        <p>Stok Barang</p>
                    </td>
                    <td><input type="number" name="stok"></td>
                </tr>

                <!-- input gambar -->
                <tr>
                    <td>
                        <p>Gambar</p>
                    </td>
                    <td><input type="text" name="gambar" id="image"></td>
                </tr>

                <!-- button simpan data -->
                <tr>
                    <td>
                        <input type='submit' class='btn btn-primary mt-4' name='submit' value="Simpan">
                    </td>
                </tr>
            </table>

        </div>
    </form>

</body>

</html>

<?php
include('lib/connection.php');
$no = 1;

$result = $con->query("SELECT * FROM `barang`");

if (isset($_GET['info'])) {
    $info = $_GET['info'];
    if ($info == 'hapus') {
        // echo "Data Berhasil di Hapus";
    }
    if ($info == 'edit') {
        echo "Data Berhasil di Edit";
    }
}
?>
<div class="detail">
    <table class="myTable" border="1" cellspacing=0 cellpadding=10>
        <thead>
            <tr>
                <th>NO</th>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Satuan</th>
                <th>Stok</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>

            <?php foreach ($result as $data) {

            ?>
                <tr>
                    <td align="center"><?= $no++ ?></td>
                    <td align="center"><?php echo $data['kode']; ?></td>
                    <td><?php echo $data['nama_produk']; ?></td>
                    <td><?php echo $data['harga_produk']; ?></td>
                    <td><?php echo $data['satuan']; ?></td>
                    <?php $stock = $data['stok'];
                    echo ($data['stok'] < 5) ? "<td style='background:red; color:#fff'>$stock</td>" : "<td>$stock</td>"; ?>
                    <td><img src='<?= $data['gambar']; ?>' width=100></td>
                    <td><a href="editing.php?kode=<?php echo $data['kode']; ?>">Edit</a> | <a href="delete.php?kode=<?php echo $data['kode']; ?>">Delete</a></td>
                </tr>
            <?php } ?>

    </table>

</div>