<?php
if ($_POST) {
    $nama_buku = $_POST['nama_buku'];
    $stok = $_POST['stok'];
    $pengarang = $_POST['pengarang'];
    $deskripsi = $_POST['deskripsi'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $foto = basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            include "koneksi.php";
            $insert = mysqli_query($conn, "insert into buku (nama_buku, stok, pengarang, deskripsi, foto) 
            value('" . $nama_buku . "','" . $stok . "','" . $pengarang . "','" . $deskripsi . "','" . $foto . "')");
            if ($insert) {
                echo "<script>alert('Sukses menambahkan buku');location.href='tampil_buku.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan buku');location.href='tampil_buku.php';</script>";
            }
        } else {
            echo "<script>alert('Gagal UPLOAD buku');location.href='tampil_buku.php';</script>";
        }
    } else {
        echo "<script>alert('File not Image');location.href='tampil_buku.php';</script>";
    }
}
