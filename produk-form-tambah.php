<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="pelanggan.css">
    <title>tambah produk</title>
    <link rel='icon' href='logo.jpg'>
</head>

<body>
    <div class="container text-center">
        <h1>tambah produk</h1>
    </div>
    <div class="pelanggan">
        <div class="formisi">
            <form action="produk-tambah.php">
                <div>
                    <label class="form-label">Nama Produk</label>
                    <input name="namaproduk" type="text" class="form-control" placeholder="Nama">
                </div>
                <div>
                    <label class="form-label">Harga</label>
                    <textarea name="harga" class="form-control" rows="2" placeholder="harga"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stock</label>
                    <input name="stock" type="text" class="form-control" placeholder="stock">
                </div>
                <div class="container text-center">
                    <a class="btn btn-success" href="produk-daftar.php">balik ke daftar</a>
                    <button type="submit" class="btn btn-success">simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>