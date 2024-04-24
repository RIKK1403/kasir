<?php

// 1. buka koneksi
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
// 2. query data pelanggan
$sql = 'SELECT * FROM produk';
$statement = $pdo->query($sql);
$daftarproduk = $statement->fetchAll(PDO::FETCH_ASSOC);
// var_dump($daftarpelanggan);

// 3. tampilkan
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Daftar produk</title>
    <link rel='icon' href='logo.jpg'>
</head>

<body>
    <div class="container text-center">
        <h1>Daftar Produk</h1>
    </div>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stock</th>
                    <th scope="col">aksi</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                    $nomor = 1;
                    foreach ($daftarproduk as $produk) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $nomor; ?> </th>
                            <td><?php echo $produk['namaproduk'] ?></td>
                            <td><?php echo $produk['harga'] ?></td>
                            <td><?php echo $produk['stock'] ?></td>
                            <td>
                                <a href="produk-form-edit.php?produkid=<?php echo $produk['produkid'] ?>">edit</a>
                                <a class="mx-2" href="produk-hapus.php?produkid=<?php echo $produk['produkid'] ?>">hapus</a>
                            </td>
                        </tr>
                    <?php
                        $nomor++;
                    }
                    ?>
                </tbody>
        </table>
        <div class="text-center">
            <a href="main.php" class="btn btn-success">Balik ke main</a>
            <a href="produk-form-tambah.php" class="btn btn-success">Tambah Produk</a>
        </div>
    </div>
</body>

</html>