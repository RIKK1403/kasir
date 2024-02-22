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
$sql = 'SELECT * FROM penjualan p
        LEFT JOIN pelanggan pe ON p.pelangganid = pe.pelangganid';
$statement = $pdo->query($sql);
$penjualan = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>pembelian</title>
</head>

<body>
    <div class="text-center">
        <h1>detail pembelian</h1>
    </div>
    <div class="container-md">
        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">nama pelanggan</th>
                        <th scope="col">tanggan pembelian</th>
                        <th scope="col">total</th>
                        <th scope="col">daftar produk</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor = 1;
                    $omset = 0;
                    foreach ($penjualan as $p) {

                        $omset = $omset + $p['totalharga'];


                        // buat sql ambil daftar produk
                        $sql1 = 'SELECT * FROM detailpenjualan 
                                LEFT JOIN produk ON detailpenjualan.produkid = produk.produkid
                                WHERE detailpenjualan.penjualanid = ?';
                        // execute
                        $statement = $pdo->prepare($sql1);

                        try {
                            $statement->execute([
                                $p['penjualanid']
                            ]);
                            $detailpenjualan = $statement->fetchAll(PDO::FETCH_ASSOC);
                        } catch (PDOException $e) {
                            echo $e->getMessage();
                        };

                        
                    ?>
                        <tr>
                            <th scope="row"><?php echo $nomor; ?> </th>
                            <td><?php echo $p['namapelanggan'] ?></td>
                            <td><?php echo $p['tanggalpenjualan'] ?></td>
                            <td><?php echo $p['totalharga'] ?></td>
                            <td>
                                <ol>
                                    <?php
                                    foreach ($detailpenjualan as $detail) {
                                        echo  '<li>' . $detail['namaproduk'] . ', ' . $detail['jumlahproduk'] . '</li>';
                                    }
                                    ?>
                                </ol>
                            </td>
                        </tr>
                    <?php
                        $nomor++;
                    }
                    ?>
                </tbody>
            </table>
            <div class="container text-center">
                <p>omset
                <?php 
                echo number_format($omset);
                ?>
                <a style="margin-left: 50px;" class="btn btn-primary" href="penjualan.php">balik ke pembelian</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>