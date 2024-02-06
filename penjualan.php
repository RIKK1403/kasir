<?php

// mengambil data pelanggan
$host = 'localhost';
$db = 'kasir';
$user = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
try {
    $pdo = new PDO($dsn, $user, $password);

    if ($pdo) {
        // echo "Connected to the $db database successfully!";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

$sql = 'SELECT * FROM pelanggan';
$statement = $pdo->query($sql);
$daftarpelanggan = $statement->fetchAll(PDO::FETCH_ASSOC);

// var_dump($daftarpelanggan);

// mengambil data produk
$sql = 'SELECT * FROM produk';
$statement = $pdo->query($sql);
$daftarproduk = $statement->fetchAll(PDO::FETCH_ASSOC);

// var_dump($daftarproduk);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <title>Penjualan</title>
</head>

<body>
    <div class="text-center">
        <h1>Penjualan</h1>
    </div>
    <div class="container">
        <form action="penjualan-simpan.php" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">pelanggan</label>
                <select name="pelangganid" class="form-select" aria-label="Default select example">
                    <?php
                    foreach ($daftarpelanggan as $pelanggan) {
                    ?>
                        <option value="<?php echo $pelanggan['pelangganid'] ?>"><?php echo $pelanggan["namapelanggan"] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <label for="">tanggal</label>
            <input type="text" name="tanggalpenjualan" id="datepicker" />
            <label for="">total</label>
            <input type="text" name="totalharga" disabled>

            <h2>produk</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">nama</th>
                        <th scope="col">jumlah</th>
                        <th scope="col">harga</th>
                        <th scope="col">sub total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">
                            <select name="produkid[0]" id="">
                                <?php
                                foreach ($daftarproduk as $produk) {
                                ?>
                                    <option value="<?php echo $produk['produkid'] ?>"><?php echo $produk["namaproduk"] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </th>
                        <td><input type="text" name="jumlahproduk[0]"></td>
                        <td>
                            <p>harga</p>
                        </td>
                        <td>
                            <p>sub total</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"> <select name="produkid[1]" id="">
                                <?php
                                foreach ($daftarproduk as $produk) {
                                ?>
                                    <option value="<?php echo $produk['produkid'] ?>"><?php echo $produk["namaproduk"] ?></option>
                                <?php
                                }
                                ?>
                            </select></th>
                        <td><input type="text" name="jumlahproduk[1]"></td>
                        <td>
                            <p>harga</p>
                        </td>
                        <td>
                            <p>sub total</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"> <select name="produkid[2]" id="">
                                <?php
                                foreach ($daftarproduk as $produk) {
                                ?>
                                    <option value="<?php echo $produk['produkid'] ?>"><?php echo $produk["namaproduk"] ?></option>
                                <?php
                                }
                                ?>
                            </select></th>
                        <td><input type="text" name="jumlahproduk[2]"></td>
                        <td>
                            <p>harga</p>
                        </td>
                        <td>
                            <p>sub total</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="text-center">
            <a href="main.php" class="btn btn-primary">kembali</a>
            <button type="submit" class="btn btn-primary">simpan</button>
            </div>
        </form>
    </div>
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap5',
            format: 'yyyy-mm-dd'
        });
    </script>
</body>

</html>