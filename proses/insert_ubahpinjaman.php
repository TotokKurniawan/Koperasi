<?php
require "../koneksi.php";
if (!empty($_POST)) {
    $output = '';
    $nama = $_POST["nama_pinjaman"];
    $ket = $_POST["keterangan_pinjaman"];
    // $bsr = $_POST["besar_simpanan"];
    $query = "
INSERT INTO k_pinjaman(nama_pinjaman, keterangan_pinjaman)
VALUES('$nama', '$ket')
";

    $result = mysqli_query($conn, $query);
    header("location: ../page-ubahpinjaman.php");


}
?>