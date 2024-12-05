<?php
include('../database/database.php');


$apiUrl = "https://wabw.chasterise.fun/api/layanan";

// Mengambil data dari API pasien
$response = file_get_contents($apiUrl);

// Mengonversi JSON response menjadi array PHP
$data = json_decode($response, true);
$items = $data['payload'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Layanan</title>
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
        <div class="p-4">
            <div class="flex items-center justify-between">
                <h1>Daftar Layanan</h1>
            </div>
            <div class="overflow-x-auto shadow-lg">
                <table class="table text-center border border-grey">
                    <!-- head -->
                    <thead>
                        <tr class="bg-blues2 text-black">
                            <th>No</th>
                            <th>Nama Layanan</th>
                            <th>Harga Layanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($items as $item) {
                            echo '
                                    <tr>
                                        <th>' . $no . '</th>
                                        <td>' . $item['nama_layanan'] . '</td>
                                        <td>' . number_format($item['biaya_layanan']) . '</td>
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