<?php
if (isset($_POST['submit'])) {
    include('../database/database.php');

    $id_eksternal = $_POST['id_eksternal'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $nama_panggilan = $_POST['nama_panggilan'];
    $no_telpon = $_POST['no_telpon'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $ras = $_POST['ras'];
    $alamat = $_POST['alamat'];
    $kode_negara = $_POST['kode_negara'];
    $bahasa_utama = $_POST['bahasa_utama'];
    $status_pernikahan = $_POST['status_pernikahan'];
    $kewarganegaraan = $_POST['kewarganegaraan'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $indikator_meninggal = $_POST['indikator_meninggal'];
    $id_insuransi = $_POST['id_insuransi'];

    do {
        if (empty($nama_lengkap) || empty($no_telpon) || empty($jenis_kelamin) || empty($tempat_lahir) || empty($tanggal_lahir) || empty($id_insuransi)) {
            echo "<script>alert('Please fill all the required fields')</script>";
            break;
        } else {
            $sql = "INSERT INTO pasien (id_eksternal, nama_lengkap, nama_panggilan, no_telpon, jenis_kelamin, ras, alamat, kode_negara, bahasa_utama, status_pernikahan, kewarganegaraan, tempat_lahir, tanggal_lahir, indikator_meninggal, id_insuransi) 
                    VALUES ('$id_eksternal', '$nama_lengkap', '$nama_panggilan', '$no_telpon', '$jenis_kelamin', '$ras', '$alamat', '$kode_negara', '$bahasa_utama', '$status_pernikahan', '$kewarganegaraan', '$tempat_lahir', '$tanggal_lahir', '$indikator_meninggal', '$id_insuransi')";

            if (mysqli_query($conn, $sql)) {
                $successMessage = 'Pasien has been created successfully';
                echo "<script>alert('$successMessage')</script>";
            } else {
                echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
            }

            // Tutup koneksi
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
</head>

<body>
    <?php include '../template/sidebar.php'; ?>
    <div class="p-4 sm:ml-64">
        <div class="p-4">
            <div class="flex items-center justify-between">
                <h1>Tambah Pasien</h1>
                <a href="pasien.php" class="bg-blues opacity-95 text-white btn hover:bg-blues hover:opacity-100">Back</a>
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
                        <div class="label">
                            <span class="label-text text-xl">ID Eksternal</span>
                        </div>
                        <input type="text" name="id_eksternal" placeholder="Type here" class="input input-bordered w-full" required />
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">Nama Lengkap</span>
                        </div>
                        <input type="text" name="nama_lengkap" placeholder="Type here" class="input input-bordered w-full" required />
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">Nama Panggilan</span>
                        </div>
                        <input type="text" name="nama_panggilan" placeholder="Type here" class="input input-bordered w-full" />
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">No Telpon</span>
                        </div>
                        <input type="text" name="no_telpon" placeholder="Type here" class="input input-bordered w-full" required />
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">Jenis Kelamin</span>
                        </div>
                        <select name="jenis_kelamin" class="select select-bordered w-full">
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                            <option value="U">Unknown</option>
                        </select>
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">Ras</span>
                        </div>
                        <input type="text" name="ras" placeholder="Type here" class="input input-bordered w-full" />
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">Alamat</span>
                        </div>
                        <textarea name="alamat" placeholder="Type here" class="textarea textarea-bordered w-full"></textarea>
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">Kode Negara</span>
                        </div>
                        <input type="text" name="kode_negara" placeholder="Type here" class="input input-bordered w-full" />
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">Bahasa Utama</span>
                        </div>
                        <input type="text" name="bahasa_utama" placeholder="Type here" class="input input-bordered w-full" />
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">Status Pernikahan</span>
                        </div>
                        <select name="status_pernikahan" class="select select-bordered w-full">
                            <option value="Belum Menikah">Belum Menikah</option>
                            <option value="Menikah">Menikah</option>
                            <option value="Duda/Janda">Duda/Janda</option>
                        </select>
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">Kewarganegaraan</span>
                        </div>
                        <input type="text" name="kewarganegaraan" placeholder="Type here" class="input input-bordered w-full" />
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">Tempat Lahir</span>
                        </div>
                        <input type="text" name="tempat_lahir" placeholder="Type here" class="input input-bordered w-full" required />
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">Tanggal Lahir</span>
                        </div>
                        <input type="date" name="tanggal_lahir" placeholder="Type here" class="input input-bordered w-full" required />
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">Indikator Meninggal</span>
                        </div>
                        <select name="indikator_meninggal" class="select select-bordered w-full">
                            <option value="Tidak">Tidak</option>
                            <option value="Ya">Ya</option>
                        </select>
                    </label>
                    <div class="label">
                        <span class="label-text text-xl">Jenis Asuransi</span>
                    </div>
                    <select name="id_insuransi" class="select select-bordered w-full">
                        <?php
                        include('../database/database.php');
                        $sql = "SELECT * FROM insuransi";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['id_insuransi'] . '">' . $row['nama_perusahaan'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                    <div class="mt-4">
                        <button name="submit" type="submit" class="bg-blues opacity-95 text-white btn hover:bg-blues hover:opacity-100">Create</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</body>