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

$pelangganid = $_GET['pelangganid'];
$tanggalpenjualan = $_GET['tanggalpenjualan'];
$total = $_GET['totalharga'];
$produkid0 = $_GET['produkid-0'];
$jumlahproduk0 = $_GET['jumlahproduk-0'];
$subtotal0 = $_GET['subtotal-0'];
$produkid1 = $_GET['produkid-1'];
$jumlahproduk1 = $_GET['jumlahproduk-1'];
$subtotal1 = $_GET['subtotal-1'];
$produkid2 = $_GET['produkid-2'];
$jumlahproduk2 = $_GET['jumlahproduk-2'];
$subtotal2 = $_GET['subtotal-2'];


$sqlpenjualan = "INSERT INTO penjualan (tanggalpenjualan,totalharga,pelangganid) VALUES (?, ?, ?)";
$statement = $pdo->prepare($sqlpenjualan);

try {
    $statement->execute([
        $tanggalpenjualan, $total, $pelangganid
    ]);

    $penjualanid = $pdo->lastInsertId();
} catch (PDOException $e) {
    echo $e->getMessage();
}


$sqldetailpenjualan = "INSERT INTO detailpenjualan (penjualanid,produkid,jumlahproduk,subtotal) VALUES (?, ?, ?, ?)";

$statement = $pdo->prepare($sqldetailpenjualan);

try {
    $statement->execute([
        $penjualanid, $produkid0, $jumlahproduk0, $subtotal0
    ]);

    $statement->execute([
        $penjualanid, $produkid1, $jumlahproduk1, $subtotal1
    ]);

    $statement->execute([
        $penjualanid, $produkid2, $jumlahproduk2, $subtotal2
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
    <title>Simpan Data penjualan</title>
</head>

<body>
    <div class="container text-center">
        <h1>pembelian berhasil</h1>
        <a class="btn btn-primary" href="penjualan.php">balik ke daftar</a>
    </div>
</body>

</html>