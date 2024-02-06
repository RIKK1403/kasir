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

$sql = "SELECT * FROM  pelanggan WHERE pelangganid = ?";

$statement = $pdo->prepare($sql);

try {
    $statement->execute([
        $pelangganid
    ]);
    $pelanggan = $statement->fetch();
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
</head>

<body>
    <div class="container text-center">
        <h1>edit pelanggan</h1>
    </div>
    <div class="pelanggan">
        <div class="formisi">
            <form action="pelanggan-edit.php">
                <div>
                    <label class="form-label">Nama</label>
                    <input name="namapelanggan" value="<?php echo $pelanggan['namapelanggan'] ?>" type="text" class="form-control" placeholder="Nama">
                </div>
                <div>
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="2" placeholder="Alamat"><?php echo $pelanggan['alamat'] ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomor telepon</label>
                    <input name="nomortelepon" value="<?php echo $pelanggan['nomortelepon'] ?>" type="text" class="form-control" placeholder="Nomor Telepon">
                </div>
                <div class="container text-center">
                    <input type="hidden" name="pelangganid" value="<?php echo $pelanggan['pelangganid'] ?>">
                    <a class="btn btn-primary" href="pelanggan-daftar.php">balik ke daftar</a>
                    <button type="submit" class="btn btn-primary">simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>