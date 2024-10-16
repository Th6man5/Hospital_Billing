<?php
if (isset($_POST['submit'])) {
    include('../database/database.php');
    $id_pasien = $_POST['id_pasien'];
    $id_layanan_array = $_POST['id_layanan'];
    $jenis_pembayaran = $_POST['jenis_pembayaran'];
    $biaya_layanan = $_POST['biaya_layanan'];
    $potongan_harga = $_POST['potongan_harga'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];

    do {
        if (empty($id_pasien) || empty($id_layanan_array) || empty($jenis_pembayaran) || empty($biaya_layanan) || empty($potongan_harga) || empty($tanggal) || empty($waktu)) {
            echo "<script>alert('Please fill all the fields')</script>";
            break;
        } else {
            $id_layanan_list = implode(",", $id_layanan_array);
            $sql_layanan = "SELECT nama_layanan FROM layanan WHERE id_layanan IN ($id_layanan_list)";
            $result = mysqli_query($conn, $sql_layanan);

            $nama_layanan_array = [];
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $nama_layanan_array[] = $row['nama_layanan'];
                }
            }

            $nama_layanan = implode(", ", $nama_layanan_array);

            $sql = "INSERT INTO transaksi (id_pasien, nama_layanan, jenis_pembayaran, biaya_layanan, potongan_harga, tanggal, waktu) 
                    VALUES ('$id_pasien', '$nama_layanan', '$jenis_pembayaran', '$biaya_layanan', '$potongan_harga', '$tanggal', '$waktu')";

            if (mysqli_query($conn, $sql)) {
                $successMessage = 'Transaksi has been created successfully';
            } else {
                echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
            }

            mysqli_close($conn);
        }
    } while (false);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Transaksi</title>
    <!-- Tambahkan Select2 CSS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
        <div class="p-4">
            <div class="flex items-center justify-between">
                <h1>Tambah Transaksi</h1>
                <a href="transaksi.php" class="bg-blues opacity-95 text-white btn hover:bg-blues hover:opacity-100">Back</a>
            </div>
            <?php
            if (!empty($successMessage)) {
                echo '
                <div>
                    <div role="alert" class="alert alert-success">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>' . $successMessage . '</span>
                    </div>
                </div>
                ';
            }
            ?>
            <form method="POST">
                <div class="p-10">
                    <label class="form-control w-full">
                        <div class="label" for="id_pasien">
                            <span class="label-text text-xl">Nama Pasien</span>
                        </div>
                        <select name="id_pasien" class="select select-bordered w-full" id="select-pasien">
                            <?php
                            include('../database/database.php');
                            $sql = "SELECT * FROM pasien";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['id_pasien'] . '">' . $row['nama'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </label>

                    <label class="form-control w-full">
                        <div class="label" for="id_pasien">
                            <span class="label-text text-xl">Jenis Layanan</span>
                        </div>
                        <select name="id_layanan[]" class="select select-bordered" id="select-layanan" multiple onchange="calculateTotal()">
                            <?php
                            include('../database/database.php');
                            $sql = "SELECT * FROM layanan";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['id_layanan'] . '" data-price="' . $row['harga'] . '">' . $row['nama_layanan'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </label>
                    <div class="w-full flex gap-x-4">
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">Biaya Layanan</span>
                            </div>
                            <input type="number" id="total-harga" placeholder="Type here" class="input input-bordered w-full " required readonly />
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">Potongan Harga</span>
                            </div>
                            <input type="text" name="potongan_harga" placeholder="Type here" class="input input-bordered w-full " required />
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">Total Harga</span>
                            </div>
                            <input type="text" name="biaya_layanan" placeholder="Type here" class="input input-bordered w-full " required />
                        </label>
                    </div>
                    <div class="w-full flex gap-x-4">
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">Jenis Pembayaran</span>
                            </div>
                            <select name="jenis_pembayaran" class="select select-bordered w-full">
                                <option value="Tunai">Tunai</option>
                                <option value="QRIS">QRIS</option>
                            </select>
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">Tanggal</span>
                            </div>
                            <input type="date" name="tanggal" placeholder="Type here" class="input input-bordered w-full " required />
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">Waktu</span>
                            </div>
                            <input type="time" name="waktu" placeholder="Type here" class="input input-bordered w-full " required />
                        </label>
                    </div>
                    <div class="mt-4">
                        <button name="submit" type="submit" class="bg-blues opacity-95 text-white btn hover:bg-blues hover:opacity-100">Create</button>
                    </div>
            </form>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
        $('#select-pasien').select2({
            placeholder: 'Pilih Nama Pasien',
            allowClear: true
        });
    });

    $(document).ready(function() {
        $('#select-layanan').select2({
            placeholder: 'Pilih Layanan',
            allowClear: true
        });
    });
</script>

<script>
    function calculateTotal() {
        let select = document.getElementById('select-layanan');
        let total = 0;

        for (let option of select.options) {
            if (option.selected) {
                total += parseFloat(option.getAttribute('data-price'));
            }
        }

        document.getElementById('total-harga').value = total;
    }
</script>