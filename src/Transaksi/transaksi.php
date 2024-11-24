<?php
// URL endpoint API
$apiDiagnosaUrl = "https://rawat-jalan.pockethost.io/api/collections/diagnosa/records";
$apiPendaftaranUrl = "https://rawat-jalan.pockethost.io/api/collections/pendaftaran/records";
$apiPasienUrl = "https://rawat-jalan.pockethost.io/api/collections/pasien/records";

// Mengambil data dari API
$responseDiagnosa = file_get_contents($apiDiagnosaUrl);
$responsePendaftaran = file_get_contents($apiPendaftaranUrl);
$responsePasien = file_get_contents($apiPasienUrl);

// Mengonversi JSON response menjadi array PHP
$dataDiagnosa = json_decode($responseDiagnosa, true);
$dataPendaftaran = json_decode($responsePendaftaran, true);
$dataPasien = json_decode($responsePasien, true);

// Menyesuaikan array data
$diagnosa = $dataDiagnosa['items'];
$pendaftaran = $dataPendaftaran['items'];
$pasien = $dataPasien['items'];

// Menggabungkan data diagnosa dengan pendaftaran
$combinedData = [];
foreach ($diagnosa as $d) {
    // Cari data pendaftaran terkait diagnosa
    foreach ($pendaftaran as $p) {
        if ($d['pendaftaran'] == $p['id']) {
            $d['pendaftaran_data'] = $p;

            // Cari data pasien terkait pendaftaran
            foreach ($pasien as $pa) {
                if ($p['pasien'] == $pa['id']) {
                    $d['pendaftaran_data']['pasien_data'] = $pa;
                    break;
                }
            }
            break;
        }
    }

    $combinedData[] = $d; // Tambahkan data gabungan ke array hasil
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Transaksi</title>
    <link href="../css/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Krona+One&family=League+Spartan:wght@100..900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Baloo+Paaji+2:wght@400..800&display=swap');

        h1 {
            font-family: "Baloo Paaji 2", sans-serif;
            font-weight: 600;
            font-size: 60px;
        }

        h6 {
            font-family: Lexend;
            font-weight: 200;
            font-size: 14px;
        }

        p {
            font-family: Lexend, sans-serif;
            font-weight: 100;
            font-size: 16px;
        }
    </style>

    </style>
</head>

<body class="bg-background h-screen">

    <?php include '../template/sidebar.php'; ?>
    <div class="p-4 sm:ml-64">
        <div class="p-4">
            <div class="flex items-center justify-between">
                <h1>Transaksi</h1>
                <!-- <a href="transaksi_create.php" class="bg-blues opacity-95 text-black btn hover:bg-blues hover:opacity-100">Tambah Transaksi</a> -->
            </div>
            <div>
                <h2>Belum Bayar</h2>
            </div>
            <div class="overflow-x-auto shadow-lg">
                <table class="table text-center  border border-grey">
                    <!-- head -->
                    <thead>
                        <tr class="bg-blues2 text-black">
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>ID Dokter</th>
                            <th>Jenis Layanan</th>
                            <th>Jenis Pemeriksaan</th>
                            <th>Kode Diagnosis</th>
                            <th>Tanggal</th>
                            <th>Status Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('../database/database.php');
                        $sqlTransaksi = "SELECT id_diagnosa FROM transaksi_diag";
                        $resultTransaksi = mysqli_query($conn, $sqlTransaksi);

                        $sudahBayarIds = [];
                        if (mysqli_num_rows($resultTransaksi) > 0) {
                            while ($row = mysqli_fetch_assoc($resultTransaksi)) {
                                $sudahBayarIds[] = $row['id_diagnosa'];
                            }
                        }

                        $no = 1;
                        foreach ($combinedData as $data) {
                            if (isset($data['pendaftaran_data']['pasien_data']) && is_array($data['pendaftaran_data']['pasien_data'])) {
                                $id = $data['id'];
                                $namaPasien = $data['pendaftaran_data']['pasien_data']['nama_lengkap'];
                                $idDokter = $data['pendaftaran_data']['dokter'];
                                $jenisLayanan = $data['jenis_layanan'];
                                $jenisPemeriksaan = $data['jenis_pemeriksaan'];
                                $kodeDiag = $data['kode_diagnosis'];
                                $tanggal = $data['tanggal'];
                                $statusPembayaran = 'Belum Bayar';
                            }
                            if (!in_array($id, $sudahBayarIds)) {
                                echo '<tr>
                                    <th>' . $no . '</th>
                                    <td>' . $namaPasien . '</td>
                                    <td>' . $idDokter . '</td>
                                    <td>' . $jenisLayanan . '</td>
                                    <td>' . $jenisPemeriksaan . '</td>
                                    <td>' . $kodeDiag . '</td>
                                    <td>' . $tanggal . '</td>
                                    <td><a href="transaksiDiag_create.php?id=' . $id . '" class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-white ring-1 ring-inset ring-red hover:bg-red hover:text-black transition-all">' . $statusPembayaran . '</a></td>
                                </tr>';
                                $no++;
                            }
                        }
                        ?>
                    </tbody>

                </table>
            </div>

            <div class="mt-4">
                <h2>Sudah Bayar</h2>
            </div>
            <div class="overflow-x-auto shadow-lg">
                <table class="table text-center  border border-grey">
                    <!-- head -->
                    <thead>
                        <tr class="bg-blues2 text-black">
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>ID Dokter</th>
                            <th>Jenis Layanan</th>
                            <th>Jenis Pemeriksaan</th>
                            <th>Kode Diagnosis</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Waktu</th>
                            <th>Total Harga</th>
                            <th>Status Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('../database/database.php');
                        $sql = "SELECT nama_pasien, dokter, jenis_layanan, jenis_pemeriksaan, kode_diagnosis, tanggal, waktu, total_harga FROM transaksi_diag";
                        $result = mysqli_query($conn, $sql);
                        $statusPembayaran = 'Sudah Bayar';
                        $no = 1;
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>
                                    <th>' . $no . '</th>
                                    <td>' . $row['nama_pasien'] . '</td>
                                    <td>' . $row['dokter'] . '</td>
                                    <td>' . $row['jenis_layanan'] . '</td>
                                    <td>' . $row['jenis_pemeriksaan'] . '</td>
                                    <td>' . $row['kode_diagnosis'] . '</td>
                                    <td>' . $row['tanggal'] . '</td>
                                    <td>' . $row['waktu'] . '</td>
                                    <td>' . $row['total_harga'] . '</td>
                                    <td><a class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-white ring-1 ring-inset ring-green hover:bg-green hover:text-black transition-all">' . $statusPembayaran . '</a></td>
                                </tr>';
                                $no++;
                            }
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>

</body>
<?php
// include('../database/database.php');
// $sql = "SELECT transaksi.id_transaksi, pasien.nama_lengkap AS nama_pasien, transaksi.nama_layanan,
//                                         transaksi.jenis_pembayaran, transaksi.biaya_layanan, transaksi.tanggal, transaksi.waktu
//                                         FROM transaksi
//                                         JOIN pasien ON transaksi.id_pasien = pasien.id_pasien;";
// $result = mysqli_query($conn, $sql);
// $no = 1;
// if (mysqli_num_rows($result) > 0) {
//     while ($row = mysqli_fetch_assoc($result)) {
//         echo '<tr>
//                                     <th>' . $no . '</th>
//                                     <td>' . $row['nama_pasien'] . '</td>
//                                     <td>' . $row['nama_layanan'] . '</td>
//                                     <td>' . $row['jenis_pembayaran'] . '</td>
//                                     <td>' . number_format($row['biaya_layanan']) . '</td> 
//                                     <td>' . $row['tanggal'] . '</td>
//                                     <td>' . $row['waktu'] . '</td>
//                                 <td class="flex gap-x-4 justify-center">

//                                     <a onclick="return confirm(\'Are you sure you want to delete this Transaction?\');" href="transaksi_delete.php?id=' . $row['id_transaksi'] . '" class="btn bg-red hover:shadow-md hover:bg-red group">
//                                         <i class="bi bi-trash-fill  transition-all"></i>
//                                     </a>
//                                 </td>
//                                 </tr>';
//         $no++;
//     }
// }
?>

</html>