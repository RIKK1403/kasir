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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="pelanggan.css">
    <title>edit pelanggan</title>
    <link rel='icon' href='logo.jpg'>
</head>

<body>
    <div class="container text-center">
        <h1>edit pelanggan</h1>
    </div>
    <div class="pelanggan">
        <div class="formisi">
            <form action="produk-edit.php">
                <div>
                    <label class="form-label">Nama produk</label>
                    <input name="namaproduk" value="<?php echo $produk['namaproduk'] ?>" type="text" class="form-control" placeholder="Nama produk">
                </div>
                <div>
                    <label class="form-label">Harga</label>
                    <textarea name="harga" class="form-control" rows="2" placeholder="harga"><?php echo $produk['harga'] ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stock produk</label>
                    <input name="stock" value="<?php echo $produk['stock'] ?>" type="text" class="form-control" placeholder="stock toko">
                </div>
                <div class="container text-center">
                    <input type="hidden" name="produkid" value="<?php echo $produk['produkid'] ?>">
                    <a class="btn btn-success" href="produk-daftar.php">balik ke daftar</a>
                    <button type="submit" class="btn btn-success">simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>