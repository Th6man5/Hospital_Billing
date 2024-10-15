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

        .table tbody tr:nth-child(odd) {
            background-color: #FFFFFF;
        }

        .table tbody tr:nth-child(even) {
            background-color: #EEEEEE;
        }
    </style>

    </style>
</head>

<body>

    <?php include '../template/sidebar.php'; ?>
    <div class="p-4 sm:ml-64">
        <div class="p-4">
            <div class="flex items-center justify-between">
                <h1>Daftar Layanan</h1>
                <a href="layanan_create.php" class="bg-blues opacity-95 text-black btn hover:bg-blues hover:opacity-100">Tambah Layanan</a>
            </div>
            <div class="overflow-x-auto">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr class="bg-blues2 text-black">
                            <th>No</th>
                            <th>Nama Layanan</th>
                            <th>Harga</th>
                            <th>Nama Dokter</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('../database/database.php');
                        $sql = "SELECT l.id_layanan, l.nama_layanan, l.harga, d.nama AS nama_dokter
                                    FROM layanan l JOIN dokter d ON l.id_dokter = d.id_dokter";
                        $result = mysqli_query($conn, $sql);
                        $no = 1;
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>
                                <th>' . $no . '</th>
                                <td>' . $row['nama_layanan'] . '</td>
                                <td>' . number_format($row['harga']) . '</td>
                                <td>' . $row['nama_dokter'] . '</td>
                                <td class="flex gap-x-4 justify-center">
                                    <a href="layanan_edit.php?id=' . $row['id_layanan'] . '" class="btn bg-yellow hover:shadow-md hover:bg-yellow group">
                                        <i class="bi bi-pencil-square  transition-all"></i>
                                    </a>
                                    <a onclick="return confirm(\'Are you sure you want to delete this room type?\');" href="layanan_delete.php?id=' . $row['id_layanan'] . '" class="btn bg-red hover:shadow-md hover:bg-red group">
                                        <i class="bi bi-trash-fill  transition-all"></i>
                                    </a>
                                </td>
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


</html>