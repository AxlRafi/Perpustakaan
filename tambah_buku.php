<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>

<body>
    <h3>Tambah Buku</h3>
    <form action="proses_tambah_buku.php" method="post" enctype="multipart/form-data">
        Nama Buku :
        <input type="text" name="nama_buku" value="" class="form-control">
        Stok :
        <input type="number" name="stok" value="" class="form-control">
        Pengarang :
        <input type="text" name="pengarang" value="" class="form-control">
        Deskripsi :
        <textarea name="deskripsi" class="form-control" rows="4"></textarea>
        Foto :
        <input type="file" name="foto" id="foto">

        <div>
            <input type="submit" name="simpan" value="Tambah Buku" class="btn btn-primary">
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>