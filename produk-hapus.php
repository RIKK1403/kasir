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

$sql = "DELETE FROM produk WHERE produkid = ?";

$statement = $pdo->prepare($sql);
// 4. execute sql
try {
    $statement->execute([
        $produkid
    ]);
    if ($statement->rowCount() > 0) {
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <title>hapus produk</title>
            <link rel='icon' href='logo.jpg'>
        </head>

        <body>
            <div class="container text-center">
                <h1 class="mb-4">berhasil menghapus produk</h1>
                <a class="btn btn-primary" href="produk-daftar.php">balik ke daftar</a>
            </div>
        </body>

        </html>

    <?php
    } else {
    ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <title> gagal hapus data</title>
        </head>

        <body>
            <div class="container text-center">
                <h1 style="margin-bottom: 2em; margin-top: 2em;">Gagal menghapus data</h1>
                <a class="btn btn-success" href="produk-daftar.php">balik ke daftar</a>
            </div>
        </body>

        </html>

<?php
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>