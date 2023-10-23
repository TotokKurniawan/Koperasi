<?php
require "../koneksi.php";
session_start();
// error_reporting(0);
if (!empty($_POST)) {
    $output = '';
    $nama = $_POST["username"];
    $pass = $_POST["password"];
    $no = $_POST["no_telp"];
    $alamat = $_POST["alamat"];
    $fotoadd = $_FILES['foto']['name'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    move_uploaded_file($file_tmp, '../foto/' . $fotoadd);
    $query = "
INSERT INTO karyawan(username, password, no_telp, alamat, foto, level)
VALUES('$nama', '$pass', '$no', '$alamat', '$fotoadd','2')
";
    echo "$query";
    $result = mysqli_query($conn, $query);


    header("location: ../page-karyawan.php");
}


?>