<?php
if ($_GET['id']) {
    include "koneksi.php";
    $id_peminjaman_buku = $_GET['id'];
    $cek_terlambat = mysqli_query($conn, "select * from peminjaman_buku where id_peminjaman_buku = '" . $id_peminjaman_buku . "' ");
    $dt_pinjam = mysqli_fetch_array($cek_terlambat);
    $qry_detail =  mysqli_query($conn, "select * from detail_peminjaman_buku where id_peminjaman_buku = '" . $id_peminjaman_buku . "' ");

    foreach ($qry_detail as $key_produk => $val_produk) {
        $qry_buku = mysqli_query($conn, "select * from detail_peminjaman_buku join buku on buku.id_buku=detail_peminjaman_buku.id_buku where id_peminjaman_buku ='" . $id_peminjaman_buku . "'");
        if ($qry_buku) {
            while ($buku = mysqli_fetch_assoc($qry_buku)) {
                $stok = $buku['stok'] + $val_produk['qty'];
                mysqli_query($conn, "update buku set stok ='" . $stok . "' where id_buku = '" . $buku['id_buku'] . "' ") or
                    die(mysqli_error($conn));
            }
        }
    }

    if (strtotime($dt_pinjam['tanggal_kembali']) >= strtotime(date('Y-m-d'))) {

        $denda = 0;
    } else {
        $harga_denda_perhari = 5000;
        $tanggal_kembali = new DateTime();
        $tgl_harus_kembali = new DateTime($dt_pinjam['tanggal_kembali']);
        $selisih_hari = $tanggal_kembali->diff($tgl_harus_kembali)->d;
        $denda = $selisih_hari * $harga_denda_perhari;
    }


    mysqli_query($conn, "insert into pengembalian_buku(id_peminjaman_buku, tanggal_pengembalian,denda)
    value('" . $id_peminjaman_buku . "','" . date('Y-m-d') . "','" . $denda . "')");
    header('location: histori_peminjaman.php');
}
