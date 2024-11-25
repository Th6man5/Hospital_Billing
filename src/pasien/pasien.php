<?php
// URL endpoint API pasien
$apiUrl = "https://rawat-jalan.pockethost.io/api/collections/pasien/records";

// Mengambil data dari API pasien
$response = file_get_contents($apiUrl);

// Mengonversi JSON response menjadi array PHP
$data = json_decode($response, true);
$items = $data['items'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Pasien</title>
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
                <h1>Pasien</h1>
                <!-- <a href="pasien_create.php" class="bg-blues opacity-95 text-black btn hover:bg-blues hover:opacity-100">Tambah Pasien</a> -->
            </div>
            <div class="overflow-x-auto shadow-lg">
                <table class="table text-center  border border-grey">
                    <!-- head -->
                    <thead>
                        <tr class="bg-blues2 text-black">
                            <th>No</th>
                            <th>ID Eksternal</th>
                            <th>Nama Lengkap</th>
                            <th>Nama Panggilan</th>
                            <th>Nama Ibu</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Tempat Lahir</th>
                            <th>Agama</th>
                            <th>Ras</th>
                            <th>Alamat</th>
                            <th>Kode Negara</th>
                            <th>No Telepon</th>
                            <th>Bahasa Utama</th>
                            <th>Status Pernikahan</th>
                            <th>No Rekening</th>
                            <th>No Sim</th>
                            <th>Kelompok Etnis</th>
                            <th>Kelahiran Kembar</th>
                            <th>Kewarganegaraan</th>
                            <th>Status Militer</th>
                            <th>Indikator Meninggal</th>
                            <th>Tanggal Meninggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($items as $item) {
                            echo '<tr>
                                <td>' . $no . '</td>
                                <td>' . $item['id_eksternal'] . '</td>
                                <td>' . $item['nama_lengkap'] . '</td>
                                <td>' . $item['nama_panggilan'] . '</td>
                                <td>' . $item['nama_ibu'] . '</td>
                                <td>' . $item['jenis_kelamin'] . '</td>
                                <td>' . $item['tanggal_lahir'] . '</td>
                                <td>' . $item['tempat_lahir'] . '</td>
                                <td>' . $item['agama'] . '</td>
                                <td>' . $item['ras'] . '</td>
                                <td>' . $item['alamat'] . '</td>
                                <td>' . $item['kode_negara'] . '</td>
                                <td>' . $item['no_telp'] . '</td>
                                <td>' . $item['bahasa_utama'] . '</td>
                                <td>' . $item['status_pernikahan'] . '</td>
                                <td>' . $item['no_rekening'] . '</td>
                                <td>' . $item['no_sim'] . '</td>
                                <td>' . $item['kelompok_etnis'] . '</td>
                                <td>' . $item['kelahiran_kembar'] . '</td>
                                <td>' . $item['kewarganegaraan'] . '</td>
                                <td>' . $item['status_militer'] . '</td>
                                <td>' . $item['indikator_meninggal'] . '</td>
                                <td>' . $item['tanggal_meninggal'] . '</td>
                            </tr>';
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

</body>


</html>