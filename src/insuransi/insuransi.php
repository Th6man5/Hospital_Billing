<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="../css/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Krona+One&family=League+Spartan:wght@100..900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap');

        h1 {
            font-family: Lexend;
            font-weight: 500;
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

<body>

    <?php include '../template/sidebar.php'; ?>
    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            <div class="flex items-center justify-between">
                <h1>Insuransi</h1>
                <a href="/grancy/src/admin/adminrooms_create.php" class="bg-blues opacity-95 text-white btn hover:bg-blues hover:opacity-100">Tambah Insuransi</a>
            </div>
            <div class="overflow-x-auto">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr class="bg-blues2">
                            <th>No</th>
                            <th>No Polis</th>
                            <th>Nama Perusahaan</th>
                            <th>Alamat Perusahaan</th>
                            <th>Tanggal Polis</th>
                            <th>No Telepon Perusahaan</th>
                            <th>Tanggal Polis Awal</th>
                            <th>Tanggal Polis Akhir</th>
                            <th>Jenis Pertanggungan</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('../database/database.php');
                        $sql = "SELECT i.id_insuransi, i.no_polis, i.nama_perusahaan, i.alamat_perusahaan, i.tanggal_polis, i.no_telepon_perusahaan, i.tanggal_polis_awal, i.tanggal_polis_akhir, i.jenis_pertanggungan
                                    FROM insuransi i";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>
                                <th>' . $row['id_insuransi'] . '</th>
                                <th>' . $row['no_polis'] . '</th>
                                <td>' . $row['nama_perusahaan'] . '</td>
                                <td>' . $row['alamat_perusahaan'] . '</td>
                                <td>' . $row['tanggal_polis'] . '</td>
                                <td>' . $row['no_telepon_perusahaan'] . '</td>
                                <td>' . $row['tanggal_polis_awal'] . '</td>
                                <td>' . $row['tanggal_polis_akhir'] . '</td>
                                <td>' . $row['jenis_pertanggungan'] . '</td>
                                <td class="flex gap-x-4 justify-center">
                                    <a href="/grancy/src/insuransi/insuransi_edit.php?id=' . $row['id_insuransi'] . '" class="btn bg-yellow hover:shadow-md hover:bg-yellow group">
                                        <i class="bi bi-pencil-square  transition-all"></i>
                                    </a>
                                    <a onclick="return confirm(\'Ingin menghapus Data Insuransi ini?\');" href="/grancy/src/insuransi/insuransi_delete.php?id=' . $row['id_insuransi'] . '" class="btn bg-red hover:shadow-md hover:bg-red group">
                                        <i class="bi bi-trash-fill  transition-all"></i>
                                    </a>
                                </td>
                                </tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

</body>


</html>