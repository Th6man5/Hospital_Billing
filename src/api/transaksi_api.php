<?php
include('../database/database.php');
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Credentials: true");

$sql = "SELECT transaksi.id_transaksi, pasien.nama_lengkap AS nama_pasien, transaksi.nama_layanan,
        transaksi.jenis_pembayaran, transaksi.biaya_layanan, transaksi.tanggal, transaksi.waktu
        FROM transaksi
        JOIN pasien ON transaksi.id_pasien = pasien.id_pasien;";
$result = mysqli_query($conn, $sql);

$data = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
} else {
    $data = ["message" => "Tidak ada data transaksi yang ditemukan"];
}

echo json_encode($data);

mysqli_close($conn);
