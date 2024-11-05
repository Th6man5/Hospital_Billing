<?php
include('../database/database.php');

// Ambil id_pasien dari request POST
$id_pasien = $_POST['id_pasien'];

// Query untuk mendapatkan potongan_harga dari tabel insuransi berdasarkan id_insuransi pada pasien
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
    echo $row['potongan_harga']; // Kirim potongan harga ke AJAX
} else {
    echo 0; // Jika tidak ditemukan, kirim nilai default
}

$stmt->close();
$conn->close();
