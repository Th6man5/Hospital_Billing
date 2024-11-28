<?php
// URL endpoint API
$apiDokterUrl = "https://rawat-jalan.pockethost.io/api/collections/dokter/records";

// Mengambil data dari API
$responseDokter = file_get_contents($apiDokterUrl);

// Mengonversi JSON response menjadi array PHP
$dataDokter = json_decode($responseDokter, true);

// Menyesuaikan array data
$items = $dataDokter['items'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Dokter</title>
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
</head>

<body class="bg-background h-screen">

    <?php include '../template/sidebar.php'; ?>
    <div class="p-4 sm:ml-64">
        <div class="p-4 ">
            <div class="flex items-center justify-between">
                <h1>Dokter</h1>
                <a href="dokter_create.php" class="bg-blues opacity-95 text-black btn hover:bg-blues hover:opacity-100">Tambah Dokter</a>
            </div>
            <div class="overflow-x-auto shadow-lg">
                <table class="table text-center border border-grey">
                    <!-- head -->
                    <thead>
                        <tr class="bg-blues2 text-black">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>No Telepon</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Spesialis</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($items as $item) {
                            echo '<tr>
                                <td>' . $no . '</td>
                                <td>' . $item['nama_dokter'] . '</td>
                                <td>' . $item['jenis_kelamin'] . '</td>
                                <td>' . $item['tanggal_lahir'] . '</td>
                                <td>' . $item['no_telp'] . '</td>
                                <td>' . $item['email'] . '</td>
                                <td>' . $item['alamat'] . '</td>
                                <td>' . $item['spesialisasi'] . '</td>
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