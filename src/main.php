<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="./css/output.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Krona+One&family=League+Spartan:wght@100..900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Baloo+Paaji+2:wght@400..800&display=swap');

        h1 {
            font-family: Lexend;
            font-weight: 500;
            font-size: 60px;
        }

        h6 {
            font-family: "Baloo Paaji 2", sans-serif;
            font-weight: 600;
            font-size: 60px;
        }

        p {
            font-family: Lexend, sans-serif;
            font-weight: 100;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <?php include 'template/sidebar.php'; ?>
    <div class="p-4 sm:ml-64">
        <div class="p-4">
            <h6 class="mb-5">Overview</h6>
            <div class="grid grid-cols-5 gap-4 mb-4 ">
                <a href="pasien/pasien.php" class="col-span-1 transform hover:animate-pulse">
                    <div class="h-36 rounded-xl bg-gray-50 dark:bg-gray-800 col-span-1 bg-blues2 p-6 hover:bg-cards">
                        <div class="grid grid-cols-2 mt-3">
                            <div>
                                <h6 class="text-2xl text-black dark:text-gray-500">
                                    Pasien
                                </h6>
                                <h6 class="text-4xl text-black dark:text-gray-500 mt-auto font-bold">
                                    <?php
                                    include('./database/database.php');
                                    $sql = "SELECT COUNT(*) as total FROM pasien;";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_array($result);

                                    echo $row['total']
                                    ?>
                                </h6>
                            </div>
                            <div class="flex justify-end items-center">
                                <svg class="bi bi-shield-shaded flex-shrink-0 w-12 h-12 text-black transition duration-75 dark:text-gray-400 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                    <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="dokter/dokter.php" class="col-span-1 transform hover:animate-pulse">
                    <div class="h-36 rounded-xl bg-gray-50 dark:bg-gray-800 col-span-1 bg-blues2 p-6 hover:bg-cards">
                        <div class="grid grid-cols-2 mt-3">
                            <div>
                                <h6 class="text-2xl text-black dark:text-gray-500">
                                    Dokter
                                </h6>
                                <h6 class="text-4xl text-black dark:text-gray-500 mt-auto font-bold">
                                    <?php
                                    include('./database/database.php');
                                    $sql = "SELECT COUNT(*) as total FROM dokter;";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_array($result);

                                    echo $row['total']
                                    ?>
                                </h6>
                            </div>
                            <div class="flex justify-end items-center">
                                <svg class="bi bi-shield-shaded flex-shrink-0 w-12 h-12 text-black transition duration-75 dark:text-gray-400 group-hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                                    <path d="M540-80q-108 0-184-76t-76-184v-23q-86-14-143-80.5T80-600v-240h120v-40h80v160h-80v-40h-40v160q0 66 47 113t113 47q66 0 113-47t47-113v-160h-40v40h-80v-160h80v40h120v240q0 90-57 156.5T360-363v23q0 75 52.5 127.5T540-160q75 0 127.5-52.5T720-340v-67q-35-12-57.5-43T640-520q0-50 35-85t85-35q50 0 85 35t35 85q0 39-22.5 70T800-407v67q0 108-76 184T540-80Zm220-400q17 0 28.5-11.5T800-520q0-17-11.5-28.5T760-560q-17 0-28.5 11.5T720-520q0 17 11.5 28.5T760-480Zm0-40Z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="insuransi/insuransi.php" class="col-span-1 transform hover:animate-pulse">
                    <div class="h-36 rounded-xl bg-gray-50 dark:bg-gray-800 col-span-1 bg-blues2 p-6 hover:bg-cards">
                        <div class="grid grid-cols-2 mt-3">
                            <div>
                                <h6 class="text-2xl text-black dark:text-gray-500">
                                    Insuransi
                                </h6>
                                <h6 class="text-4xl text-black dark:text-gray-500 mt-auto font-bold">
                                    <?php
                                    include('./database/database.php');
                                    $sql = "SELECT COUNT(*) as total FROM insuransi;";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_array($result);

                                    echo $row['total']
                                    ?>
                                </h6>
                            </div>
                            <div class="flex justify-end items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-shield-shaded flex-shrink-0 w-12 h-12 text-black transition duration-75 dark:text-gray-400 group-hover:text-gray-900" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 14.933a1 1 0 0 0 .1-.025q.114-.034.294-.118c.24-.113.547-.29.893-.533a10.7 10.7 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.8 11.8 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.8 11.8 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 63 63 0 0 1 5.072.56" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="transaksi/transaksi.php" class="col-span-1 transform hover:animate-pulse">
                    <div class="h-36 rounded-xl bg-gray-50 dark:bg-gray-800 col-span-1 bg-blues2 p-6 hover:bg-cards">
                        <div class="grid grid-cols-2 mt-3">
                            <div>
                                <h6 class="text-2xl text-black dark:text-gray-500">
                                    Transaksi
                                </h6>
                                <h6 class="text-4xl text-black dark:text-gray-500 mt-auto font-bold">
                                    <?php
                                    include('./database/database.php');
                                    $sql = "SELECT COUNT(*) as total FROM transaksi;";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_array($result);

                                    echo $row['total']
                                    ?>
                                </h6>
                            </div>
                            <div class="flex justify-end items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-shield-shaded flex-shrink-0 w-12 h-12 text-black transition duration-75 dark:text-gray-400 group-hover:text-gray-900" viewBox="0 0 16 16">
                                    <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                                    <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="layanan/layanan.php" class="col-span-1 transform hover:animate-pulse">
                    <div class="h-36 rounded-xl bg-gray-50 dark:bg-gray-800 col-span-1 bg-blues2 p-6 hover:bg-cards">
                        <div class="grid grid-cols-2 mt-3">
                            <div>
                                <h6 class="text-2xl text-black dark:text-gray-500">
                                    Layanan
                                </h6>
                                <h6 class="text-4xl text-black dark:text-gray-500 mt-auto font-bold">
                                    <?php
                                    include('./database/database.php');
                                    $sql = "SELECT COUNT(*) as total FROM layanan;";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_array($result);

                                    echo $row['total']
                                    ?>
                                </h6>
                            </div>
                            <div class="flex justify-end items-center">
                                <svg class="bi bi-shield-shaded flex-shrink-0 w-12 h-12 text-black transition duration-75 dark:text-gray-400 group-hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                                    <path d="M160-80q-33 0-56.5-23.5T80-160v-480q0-33 23.5-56.5T160-720h160v-80q0-33 23.5-56.5T400-880h160q33 0 56.5 23.5T640-800v80h160q33 0 56.5 23.5T880-640v480q0 33-23.5 56.5T800-80H160Zm0-80h640v-480H160v480Zm240-560h160v-80H400v80ZM160-160v-480 480Zm280-200v120h80v-120h120v-80H520v-120h-80v120H320v80h120Z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="mt-10">
                <h6 class="mb-5">Transaksi Terbaru</h6>
                <?php
                include('./database/database.php');
                $sql = "SELECT * FROM transaksi JOIN pasien ON transaksi.id_pasien = pasien.id_pasien WHERE tanggal >= DATE_SUB(CURDATE(), INTERVAL 1 DAY) ORDER BY tanggal DESC, waktu DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table class='table text-center'>";
                    echo "<tr class = 'bg-blues2 text-black '> 
                      <th>ID Transaksi</th>
                      <th>Nama Pasien</th>
                      <th>Nama Layanan</th>
                      <th>Jenis Pembayaran</th>
                      <th>Total Harga</th>
                      <th>Potongan Harga</th>
                      <th>Tanggal</th>
                      <th>Waktu</th>
                      </tr>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_transaksi"] . "</td>";
                        echo "<td>" . $row["nama"] . "</td>";
                        echo "<td>" . $row["nama_layanan"] . "</td>";
                        echo "<td>" . $row["jenis_pembayaran"] . "</td>";
                        echo "<td>" . $row["biaya_layanan"] . "</td>";
                        echo "<td>" . $row["potongan_harga"] . "</td>";
                        echo "<td>" . $row["tanggal"] . "</td>";
                        echo "<td>" . $row["waktu"] . "</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                } else {
                    echo "No new transactions found.";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </div>

</body>


</html>