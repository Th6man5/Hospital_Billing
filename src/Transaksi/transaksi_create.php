<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Credentials: true");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('../database/database.php');

    $id_pasien = $_POST['id_pasien'];
    $nama_layanan_array = $_POST['id_layanan'];
    $jenis_pembayaran = $_POST['jenis_pembayaran'];
    $biaya_layanan = $_POST['biaya_layanan'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];

    $response = [];

    do {
        if (empty($id_pasien) || empty($nama_layanan_array) || empty($jenis_pembayaran) || empty($biaya_layanan) || empty($tanggal) || empty($waktu)) {
            $response['error'] = 'Please fill all the fields';
            echo json_encode($response);
            break;
        } else {
            if (is_array($nama_layanan_array)) {
                $nama_layanan = implode(", ", $nama_layanan_array);
            } else {
                $nama_layanan = $nama_layanan_array;
            }

            $sql = "INSERT INTO transaksi (id_pasien, nama_layanan, jenis_pembayaran, biaya_layanan, tanggal, waktu) 
                    VALUES ('$id_pasien', '$nama_layanan', '$jenis_pembayaran', '$biaya_layanan', '$tanggal', '$waktu')";

            if (mysqli_query($conn, $sql)) {
                $response['success'] = 'Transaksi has been created successfully';
            } else {
                $response['error'] = 'Error: ' . mysqli_error($conn);
            }

            mysqli_close($conn);
            // echo json_encode($response);
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
                <h1>Tambah Transaksi</h1>
                <a href="transaksi.php" class="bg-blues opacity-95 text-white btn hover:bg-blues hover:opacity-100">Back</a>
            </div>
            <?php
            if (!empty($response['success'])) {
                echo '
                <div>
                    <div role="alert" class="alert alert-success">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>' . $response['success'] . '</span>
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
                        <select name="id_pasien" class="select select-bordered w-full" id="select-pasien" onchange="fetchPotonganHarga()" onchange="this.form.submit()">
                            <?php
                            include('../database/database.php');
                            $sql = "SELECT * FROM pasien";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['id_pasien'] . '">' . $row['nama_lengkap'] .  " | "  . $row['id_eksternal'] . '</option>';
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
                                    echo '<option value="' . $row['nama_layanan'] . '" data-price="' . $row['harga'] . '">' . $row['nama_layanan'] . ' | ' . number_format($row['harga']) .  '</option>';
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
                            <input type="number" id="total-harga" placeholder="Type here" class="input input-bordered w-full" required readonly />
                        </label>

                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">Potongan Harga</span>
                            </div>
                            <input type="number" name="potongan_harga" placeholder="Type here" class="input input-bordered w-full" id="potongan-harga" required oninput="calculateDiscountedPrice()" value="<?php echo htmlspecialchars($potongan_harga); ?>" readonly />
                        </label>

                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">Total Harga</span>
                            </div>
                            <input type="text" name="biaya_layanan" placeholder="Type here" class="input input-bordered w-full" id="harga-diskon" required readonly />
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
                            <input type="date" id="tanggal" name="tanggal" placeholder="Type here" class="input input-bordered w-full" required readonly />
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">Waktu</span>
                            </div>
                            <input type="time" id="waktu" name="waktu" placeholder="Type here" class="input input-bordered w-full" required readonly />
                        </label>

                        <script>
                            // Mendapatkan tanggal dan waktu saat ini
                            const now = new Date();

                            // Format tanggal ke 'YYYY-MM-DD'
                            const today = now.toISOString().split("T")[0];
                            document.getElementById("tanggal").value = today;

                            // Format waktu ke 'HH:MM'
                            const currentTime = now.toTimeString().slice(0, 8);
                            document.getElementById("waktu").value = currentTime;
                        </script>

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

        calculateDiscountedPrice();
    }

    function calculateDiscountedPrice() {
        let totalHargaLayanan = parseFloat(document.getElementById('total-harga').value) || 0;
        let potonganHarga = parseFloat(document.getElementById('potongan-harga').value) || 0;

        let totalSetelahPotongan = totalHargaLayanan - (totalHargaLayanan * (potonganHarga / 100));

        if (totalSetelahPotongan < 0) {
            totalSetelahPotongan = 0;
        }

        document.getElementById('harga-diskon').value = totalSetelahPotongan.toFixed(2);
    }
</script>

<script>
    function fetchPotonganHarga() {
        var idPasien = document.getElementById("select-pasien").value;

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "get_potongan_harga.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById("potongan-harga").value = xhr.responseText;
            }
        };
        xhr.send("id_pasien=" + idPasien);
    }
</script>