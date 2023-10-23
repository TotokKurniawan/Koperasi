<?php
require "../koneksi.php";
if (!empty($_POST)) {
    $output = '';
    $nama = $_POST["nm_simpanan"];
    $ket = $_POST["ket_simpanan"];
    $bsr = $_POST["besar_simpanan"];
    $query = "
INSERT INTO k_simpanan(nm_simpanan, ket_simpanan, besar_simpanan)
VALUES('$nama', '$ket', '$bsr')
";

    $result = mysqli_query($conn, $query);
    header("location: ../page-ubahsimpanan.php");


}
?>