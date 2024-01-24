<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Daftar produk</title>
</head>

<body>
    <div class="container text-center">
        <h1>Daftar Produk</h1>
    </div>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stock</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Milku</td>
                    <td>3000</td>
                    <td>12</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Mie gelas</td>
                    <td>2500</td>
                    <td>30</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Mie ayam</td>
                    <td>15000</td>
                    <td>40</td>
                </tr>
            </tbody>
        </table>
        <div class="text-center">
            <a href="main.php" class="btn btn-primary">Balik ke main</a>
            <a href="produk-form-tambah.php" class="btn btn-primary">Tambah Produk</a>
        </div>
    </div>
</body>

</html>