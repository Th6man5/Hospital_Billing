<?php
include('../database/database.php');

$id_pasien = $_POST['id_pasien'];

$sql = "SELECT insuransi.potongan_harga 
        FROM insuransi 
        INNER JOIN pasien ON pasien.id_insuransi = insuransi.id_insuransi 
        WHERE pasien.id_pasien = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_pasien);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row['potongan_harga'];
} else {
    echo 0;
}

$stmt->close();
$conn->close();
