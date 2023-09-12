<?php
include "header.php";
?>
<h2>Daftar Buku</h2>
<div class="row">
    <?php
    include "koneksi.php";
    $qry_buku = mysqli_query($conn, "select * from buku");
    while ($dt_buku = mysqli_fetch_array($qry_buku)) {
    ?>
        <div class="col-md-3">
            <div class="card">
                <img width="250px" height="250px" src="uploads/<?= $dt_buku['foto'] ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?= $dt_buku['nama_buku'] ?></h5>
                    <p class="card-text"><?= substr(
                                                $dt_buku['deskripsi'],
                                                0,
                                                20
                                            ) ?>
                    <p class="card-text"><?= $dt_buku['stok'] ?>
                        In Library</p>

                    <?php if ($dt_buku['stok'] < 1) { ?>
                        <button href="pinjam_buku.php?id_buku=<?= $dt_buku['id_buku'] ?>" class="btn btn-primary" disabled>Pinjam</button>
                    <?php } else { ?>
                        <a href="pinjam_buku.php?id_buku=<?= $dt_buku['id_buku'] ?>" class="btn btn-primary">Pinjam</a>
                    <?php } ?>

                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<?php
include "footer.php";
?>