<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>tambah pelanggant</title>
</head>

<body>
    <h1>tambah pelanggan</h1>
    <form action="pelanggan-tambah.php">
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input name="namapelanggan" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="2"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Nomor telepon</label>
            <input name="nomortelepon" type="text" class="form-control">
        </div>
        <div class="mb-3">
        <button type="submit" class="btn btn-primary">simpan</button>
        </div>
    </form>
    <a href="pelanggan-daftar.php">balik ke daftar</a>
</body>

</html>