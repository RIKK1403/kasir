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
// 2. buat variabel untuk simpan data
// var_dump($_GET);
$namaproduk = $_GET['namaproduk'];
$harga = $_GET['harga'];
$stock = $_GET['stock'];

// 3. sql simpan data
$sql = "INSERT INTO produk (namaproduk,harga,stock) VALUES (?, ?, ?)";
$statement = $pdo->prepare($sql);
// 4. execute sql
$statement->execute([
    $namaproduk, $harga, $stock
]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Simpan Data</title>
</head>

<body>
    <div class="container text-center">
        <h1>berhasil nyimpen data produk</h1>
        <a class="btn btn-primary" href="produk-daftar.php">balik ke daftar</a>
    </div>
</body>

</html>