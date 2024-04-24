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
$sql = 'SELECT * FROM pelanggan';
$statement = $pdo->query($sql);
$daftarpelanggan = $statement->fetchAll(PDO::FETCH_ASSOC);
// var_dump($daftarpelanggan);

// 3. tampilkan

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>pelanggan</title>
    <link rel='icon' href='logo.jpg'>
</head>

<body>
    <div class="text-center">
        <h1>daftar pelanggan</h1>
    </div>
    <div class="container-md">
        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama pelanggan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Nomor telepon</th>
                        <th scope="col">aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor = 1;
                    foreach ($daftarpelanggan as $pelanggan) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $nomor; ?> </th>
                            <td><?php echo $pelanggan['namapelanggan'] ?></td>
                            <td><?php echo $pelanggan['alamat'] ?></td>
                            <td><?php echo $pelanggan['nomortelepon'] ?></td>
                            <td>
                                <a href="pelanggan-form-edit.php?pelangganid=<?php echo $pelanggan['pelangganid'] ?>">edit</a>
                                <a class="mx-2" href="pelanggan-hapus.php?pelangganid=<?php echo $pelanggan['pelangganid'] ?>">hapus</a>
                            </td>
                        </tr>
                    <?php
                        $nomor++;
                    }
                    ?>
                </tbody>
            </table>
            <div class="container text-center">
                <a class="btn btn-success" href="main.php">balik ke main</a>
                <a class="btn btn-success" href="pelanggan-form-tambah.php">tambah pelanggan</a>
            </div>
        </div>
    </div>
</body>

</html>