<?php

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

$namaproduk = $_GET['namaproduk'];
$harga = $_GET['harga'];
$stok = $_GET['stok'];
$produkid = $_GET['produkid'];

$sql = "UPDATE produk SET namaproduk=?, harga=?, stok=? WHERE produkid=?";


$statement = $pdo->prepare($sql);

try {
    $statement->execute([
        $namaproduk, 
        $harga,
        $stok,
        $produkid,
    ]);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <title>edit data</title>
        </head>

        <body>
            <div class="container text-center">
                <h1 class="mb-4">berhasil edit data</h1>
                <a class="btn btn-primary" href="pelanggan-daftar.php">balik ke daftar</a>
            </div>
        </body>

        </html>