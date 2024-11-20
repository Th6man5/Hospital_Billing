<?php
include('../database/database.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // URL endpoint API
    $apiDiagnosaUrl = "https://rawat-jalan.pockethost.io/api/collections/diagnosa/records";
    $apiPendaftaranUrl = "https://rawat-jalan.pockethost.io/api/collections/pendaftaran/records";
    $apiPasienUrl = "https://rawat-jalan.pockethost.io/api/collections/pasien/records";

    // Ambil data dari API
    $responseDiagnosa = file_get_contents($apiDiagnosaUrl);
    $responsePendaftaran = file_get_contents($apiPendaftaranUrl);
    $responsePasien = file_get_contents($apiPasienUrl);

    $dataDiagnosa = json_decode($responseDiagnosa, true);
    $dataPendaftaran = json_decode($responsePendaftaran, true);
    $dataPasien = json_decode($responsePasien, true);

    if (isset($dataDiagnosa['items'])) {
        $diagnosaList = $dataDiagnosa['items'];
        $data = null;

        // Cari data diagnosa berdasarkan ID
        foreach ($diagnosaList as $diagnosa) {
            if ($diagnosa['id'] === $id) {
                $data = $diagnosa;
                break;
            }
        }

        if ($data) {
            // Cari data pendaftaran terkait diagnosa
            $pendaftaranData = null;
            foreach ($dataPendaftaran['items'] as $pendaftaran) {
                if ($pendaftaran['id'] === $data['pendaftaran']) {
                    $pendaftaranData = $pendaftaran;
                    break;
                }
            }

            // Cari data pasien terkait pendaftaran
            if ($pendaftaranData) {
                $pasienData = null;
                foreach ($dataPasien['items'] as $pasien) {
                    if ($pasien['id'] === $pendaftaranData['pasien']) {
                        $pasienData = $pasien;
                        break;
                    }
                }

                // Gabungkan data diagnosa, pendaftaran, dan pasien
                $data['pendaftaran_data'] = $pendaftaranData;
                if ($pasienData) {
                    $data['pendaftaran_data']['pasien_data'] = $pasienData;
                }
            }
        } else {
            echo "Data diagnosa tidak ditemukan.";
        }
    } else {
        echo "Gagal mengambil data dari API Diagnosa.";
    }

    $data['nama_lengkap'] = $data['pendaftaran_data']['pasien_data']['nama_lengkap'];
    $data['kode_diagnosis'] = $data['kode_diagnosis'];
    $data['dokter'] = $data['pendaftaran_data']['dokter'];
    $data['status'] = $data['pendaftaran_data']['status'];
} else {
    echo "ID tidak tersedia.";
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nama_pasien = $_POST['nama_pasien'];
    $dokter = $_POST['dokter'];
    $status = $_POST['status'];
    $kode_diagnosis = $_POST['kode_diagnosis'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $jenis_pembayaran = $_POST['jenis_pembayaran'];
    $total_harga = $_POST['total_harga'];

    $response = [];

    do {
        if (empty($nama_pasien) || empty($dokter) || empty($status) || empty($tanggal) || empty($tanggal) || empty($total_harga)) {
            $response['error'] = 'Please fill all the fields';
            echo json_encode($response);
            break;
        } else {
            $sql = "INSERT INTO transaksi_diag (nama_pasien, dokter, status, kode_diagnosis, tanggal, waktu, jenis_pembayaran, total_harga) 
                    VALUES ('$nama_pasien', '$dokter', '$status', '$kode_diagnosis', '$tanggal', '$waktu', '$jenis_pembayaran', '$total_harga')";

            if (mysqli_query($conn, $sql)) {
                $response['success'] = 'Transaksi has been created successfully';
            } else {
                $response['error'] = 'Error: ' . mysqli_error($conn);
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


    <script>
        const now = new Date();

        const today = now.toISOString().split("T")[0];
        document.getElementById("tanggal").value = today;

        const currentTime = now.toTimeString().slice(0, 8);
        document.getElementById("waktu").value = currentTime;
    </script>

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
            <form method="post">
                <div class="p-10">
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">Nama Pasien</span>
                        </div>
                        <input type="text" name="nama_pasien" placeholder="Type here" class="input input-bordered w-full" value="<?php echo htmlspecialchars($data['nama_lengkap']); ?>" required readonly />
                    </label>

                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">Kode Diagnosis</span>
                        </div>
                        <input type="text" name="kode_diagnosis" placeholder="Type here" class="input input-bordered w-full" value="<?php echo htmlspecialchars($data['kode_diagnosis']); ?>" required readonly />
                    </label>

                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">Dokter</span>
                        </div>
                        <input type="text" name="dokter" placeholder="Type here" class="input input-bordered w-full" value="<?php echo htmlspecialchars($data['dokter']); ?>" required readonly />
                    </label>

                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">Status</span>
                        </div>
                        <input type="text" name="status" placeholder="Type here" class="input input-bordered w-full" value="<?php echo htmlspecialchars($data['status']); ?>" required readonly />
                    </label>

                    <div class="grid grid-cols-2 gap-4">
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">Tanggal Diagnosa</span>
                            </div>
                            <input type="date" placeholder="Type here" class="input input-bordered w-full" value="<?php echo htmlspecialchars($data['tanggal']); ?>" required readonly />
                        </label>

                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">Tanggal Bayar</span>
                            </div>
                            <input type="date" id="tanggal" name="tanggal" placeholder="Type here" class="input input-bordered w-full" value="<?php date("Y-m-d"); ?>" required />
                        </label>
                    </div>

                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">Waktu Bayar</span>
                        </div>
                        <input type="time" id="waktu" name="waktu" placeholder="Type here" class="input input-bordered w-full" required />
                    </label>

                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">Total Harga</span>
                        </div>
                        <input type="number" name="total_harga" placeholder="Type here" class="input input-bordered w-full" required />
                    </label>

                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">Jenis Pembayaran</span>
                        </div>
                        <select name="jenis_pembayaran" class="input input-bordered w-full">
                            <option value="Mandiri">Mandiri</option>
                            <option value="BPJS">BPJS</option>
                        </select>
                    </label>

                    <div class="mt-4">
                        <button name="submit" type="submit" class="bg-blues opacity-95 text-black btn hover:bg-blues hover:opacity-100">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>