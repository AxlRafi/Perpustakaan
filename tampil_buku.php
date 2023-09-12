<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css
" rel="stylesheet" integrity="sha384-
+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Tampil Buku</title>
</head>

<body>
    <?php
    include "header.php";
    ?>
    <h3>Tampil Buku</h3>
    <div>
        <a href="tambah_buku.php" class="btn btn-success">Tambah Buku</a>
    </div>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>NO</th>
                <th style="width:15%">NAMA
                    BUKU</th>
                <th>STOK</th>
                <th style="width:15%">PENGARANG</th>
                <th style="width:15%">DESKRIPSI</th>
                <th style="width:15%">FOTO</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "koneksi.php";
            $qry_buku = mysqli_query($conn, "select * from buku");
            $no = 0;
            while ($data_buku = mysqli_fetch_array($qry_buku)) {
                $no++; ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $data_buku['nama_buku'] ?></td>
                    <td><?= $data_buku['stok'] ?></td>
                    <td><?= $data_buku['pengarang'] ?></td>
                    <td><?= $data_buku['deskripsi'] ?></td>
                    <td> <img src="uploads/<?= $data_buku['foto'] ?>" class="card-img-top" width="250px" height="200px">
                    <td>
                        <a href="ubah_buku.php?id_buku=<?= $data_buku['id_buku'] ?>" class="btn btn-success">Ubah</a>
                        |
                        <a href="hapus_buku.php?id_buku=<?= $data_buku['id_buku'] ?>" onclick="returnconfirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <?php
    include "footer.php";
    ?>
</body>

</html>