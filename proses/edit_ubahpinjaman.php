<?php
require '../koneksi.php';
session_start();
if (isset($_POST['update'])) {
    $id = $_POST['id_pinjaman'];
    $nama = $_POST['nama_pinjaman'];
    $ket = $_POST['keterangan_pinjaman'];

    $query = "UPDATE k_pinjaman SET nama_pinjaman='$nama', keterangan_pinjaman='$ket' WHERE id='$id'";
    echo $query;
    $result = mysqli_query($conn, $query);
    header('Location: ../page-ubahpinjaman.php');
} ?>