<?php 

$tanggalpenjualan = $_POST['tanggalpenjualan'];
$pelangganid = $_POST['pelangganid'];
$produkid = $_POST['produkid'];
$jumlahproduk = $_POST['jumlahproduk'];


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

$sql = "INSERT INTO penjualan (tanggalpenjualan,totalharga,pelangganid) VALUES (?, ?, ?)";
$statement = $pdo->prepare($sql);

$statement->execute([
    $tanggalpenjualan, 0, $pelangganid
]);
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