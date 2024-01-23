<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="pelanggan.css">
    <title>tambah pelanggant</title>
</head>

<body>
    <div class="container text-center">
        <h1>tambah pelanggan</h1>
    </div>
    <div class="pelanggan">
        <div class="formisi">
            <form action="pelanggan-tambah.php">
                <div>
                    <label class="form-label">Nama</label>
                    <input name="namapelanggan" type="text" class="form-control" placeholder="Nama">
                </div>
                <div>
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="2" placeholder="Alamat"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomor telepon</label>
                    <input name="nomortelepon" type="text" class="form-control" placeholder="Nomor Telepon">
                </div>
                <div class="container text-center">
                    <button type="submit" class="btn btn-primary">simpan</button>
                    <a class="btn btn-primary" href="pelanggan-daftar.php">balik ke daftar</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>