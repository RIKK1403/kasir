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

$produkid = $_GET['produkid'];

$sql = "SELECT * FROM  produk WHERE produkid = ?";

$statement = $pdo->prepare($sql);

try {
    $statement->execute([
        $produkid
    ]);
    $produk = $statement->fetch();
} catch (PDOException $e) {
    echo $e->getMessage();
};

header('Content-Type: application/json; charset=utf-8');
echo json_encode($produk);
