<?php
require "../koneksi.php";
session_start();

if (!empty($_POST)) {
    $output = '';

    $id = $_POST["id_karyawan"];
    if ($fotoadd) {
        // hapus file lama
        $query = "SELECT foto FROM karyawan WHERE id='$id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $foto_lama = $row['foto'];
        unlink('../foto/' . $foto_lama);
    }
    $nama = $_POST["username"];
    $pass = $_POST["password"];
    $no = $_POST["no_telp"];
    $alamat = $_POST["alamat"];
    $fotoadd = $_FILES['foto']['name'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    move_uploaded_file($file_tmp, '../foto/' . $fotoadd);
    $query = "UPDATE karyawan SET username='$nama', password='$pass', no_telp='$no', alamat='$alamat', foto='$fotoadd' WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    header("location: ../page-karyawan.php");
}
?>