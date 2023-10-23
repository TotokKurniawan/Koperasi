<?php
require("koneksi.php");
header('Content-Type: application/json');

$query = "SELECT * from simpanan";

$result = mysqli_query($conn, $query);

$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>