<?php
require '../koneksi.php';
session_start();
if (isset($_POST['update'])) {
    $id = $_POST['id_simpanan_edit'];
    $nama = $_POST['nm_simpanan_edit'];
    $ket = $_POST['ket_simpanan_edit'];
    $bsr = $_POST['besar_simpanan_edit'];

    $query = "UPDATE k_simpanan SET nm_simpanan='$nama', ket_simpanan='$ket',besar_simpanan='$bsr' WHERE id='$id'";
    echo $query;
    $result = mysqli_query($conn, $query);
    header('Location: ../page-ubahsimpanan.php');
} ?>