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
                <h1>Dokter</h1>
                <a href="/hospital_billing/src/admin/adminrooms_create.php" class="bg-blues opacity-95 text-white btn hover:bg-blues hover:opacity-100">Tambah Dokter</a>
            </div>
            <div class="overflow-x-auto">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr class="bg-blues2">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>No Telepon</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Spesialis</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('../database/database.php');
                        $sql = "SELECT d.id_dokter, d.nama, d.jenis_kelamin, d.tanggal_lahir, d.no_telepon, d.email, d.alamat, d.spesialis
                                    FROM dokter d ";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>
                                <th>' . $row['id_dokter'] . '</th>
                                <td>' . $row['nama'] . '</td>
                                <td>' . $row['jenis_kelamin'] . '</td>
                                <td>' . $row['tanggal_lahir'] . '</td>
                                <td>' . $row['no_telepon'] . '</td>
                                <td>' . $row['email'] . '</td>
                                <td>' . $row['alamat'] . '</td>
                                <td>' . $row['spesialis'] . '</td>
                                <td class="flex gap-x-4 justify-center">
                                    <a href="/hospital_billing/src/dokter/dokter_edit.php?id=' . $row['id_dokter'] . '" class="btn bg-yellow hover:shadow-md hover:bg-yellow group">
                                        <i class="bi bi-pencil-square  transition-all"></i>
                                    </a>
                                    <a onclick="return confirm(\'Are you sure you want to delete this room type?\');" href="/hospital_billing/src/dokter/dokter_delete.php?id=' . $row['id_dokter'] . '" class="btn bg-red hover:shadow-md hover:bg-red group">
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