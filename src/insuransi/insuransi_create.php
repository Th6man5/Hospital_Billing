<?php
if (isset($_POST['submit'])) {
    include('../database/database.php');
    $no_polis = $_POST['no_polis'];
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $alamat_perusahaan = $_POST['alamat_perusahaan'];
    $tanggal_polis = $_POST['tanggal_polis'];
    $no_telepon_perusahaan = $_POST['no_telepon_perusahaan'];
    $tanggal_polis_awal = $_POST['tanggal_polis_awal'];
    $tanggal_polis_akhir = $_POST['tanggal_polis_akhir'];
    $jenis_pertanggungan = $_POST['jenis_pertanggungan'];

    do {
        if (empty($no_polis) || empty($nama_perusahaan) || empty($Alamat_perusahaan) || empty($Tanggal_polis) || empty($no_telepon_perusahaan) || empty($tanggal_polis_awal) || empty($tanggal_polis_awal) || empty($jenis_pertanggungan)) {
            echo "<script>alert('Please fill all the fields')</script>";
            break;
        } else {
            $sql = "INSERT INTO insuransi (no_polis, nama_perusahaan, alamat_perusahaan , tanggal_polis, no_telepon_perusahaan, tanggal_polis_awal , tanggal_polis_akhir, jenis_pertanggungan) VALUES ('$no_polis', '$nama_perusahaan', '$alamat_perusahaan', '$tanggal_polis', '$no_telepon_perusahaan', '$tanggal_polis_awal', '$tanggal_polis_akhir','$jenis_pertanggungan' )";
            if (mysqli_query($conn, $sql)) {
                $successMessage = 'Insuransi has been created successfully';
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
    <title>Dashboard | Insuransi</title>
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
                <h1>Tambah Insuransi</h1>
                <a href="insuransi.php" class="bg-blues opacity-95 text-white btn hover:bg-blues hover:opacity-100">Back</a>
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
                            <span class="label-text text-xl">No Polis</span>
                        </div>
                        <input type="text" name="no_polis" placeholder="Type here" class="input input-bordered w-full " required />
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">Nama Perusahaan</span>
                        </div>
                        <input type="text" name="nama_perusahaan" placeholder="Type here" class="input input-bordered w-full " required />
                    </label>
                    <div class="w-full grid-cols-3 grid gap-x-4">
                            <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">Alamat Perusahaan</span>
                            </div>
                            <input type="text" name="alamat_perusahaan" placeholder="Type here" class="input input-bordered w-full " required />
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">Tanggal Polis</span>
                            </div>
                            <input type="date" name="tanggal_polis" placeholder="Type here" class="input input-bordered w-full " required />
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">No Telepon Perusahaan</span>
                            </div>
                            <input type="text" name="no_telepon_perusahaan" placeholder="Type here" class="input input-bordered w-full " required />
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">Tanggal Polis Awal</span>
                            </div>
                            <input type="date" name="tanggal_polis_awal" placeholder="Type here" class="input input-bordered w-full " required />
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">Tanggal Polis Akhir</span>
                            </div>
                            <input type="date" name="tanggal_polis_akhir" placeholder="Type here" class="input input-bordered w-full " required />
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">Jenis Pertanggungan</span>
                            </div>
                            <input type="text" name="jenis_pertanggungan" placeholder="Type here" class="input input-bordered w-full " required />
                        </label>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button name="submit" type="submit" class="bg-blues opacity-95 text-white btn hover:bg-blues hover:opacity-100">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>