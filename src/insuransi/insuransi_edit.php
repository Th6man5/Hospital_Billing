<?php
include('../database/database.php');

$no_polis = $nama_perusahaan = $alamat_perusahaan = $tanggal_polis = $no_telepon_perusahaan = $tanggal_polis_awal = $tanggal_polis_akhir = $jenis_pertanggungan = '';

$successMessage = '';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['id'])) {
        header('Location: /hospital_billing/src/insuransi/insuransi.php');
        exit;
    }

    $id = $_GET['id'];

    $sql = "SELECT * FROM insuransi WHERE id_insuransi = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        header('Location: /hospital_billing/src/insuransi/insuransi.php');
        exit;
    }

    $no_polis = $row['no_polis'];
    $nama_perusahaan = $row['nama_perusahaan'];
    $alamat_perusahaan = $row['alamat_perusahaan'];
    $tanggal_polis = $row['tanggal_polis'];
    $no_telepon_perusahaan = $row['no_telepon_perusahaan'];
    $tanggal_polis_awal = $row['tanggal_polis_awal'];
    $tanggal_polis_akhir = $row['tanggal_polis_akhir'];
    $jenis_pertanggungan = $row['jenis_pertanggungan'];
} else {
    $id = $_POST['id_insuransi'];
    $no_polis = $_POST['no_polis'];
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $alamat_perusahaan = $_POST['alamat_perusahaan'];
    $tanggal_polis = $_POST['tanggal_polis'];
    $no_telepon_perusahaan = $_POST['no_telepon_perusahaan'];
    $tanggal_polis_awal = $_POST['tanggal_polis_awal'];
    $tanggal_polis_akhir = $_POST['tanggal_polis_akhir'];
    $jenis_pertanggungan = $_POST['jenis_pertanggungan'];

    do {
        if (empty($no_polis) || empty($nama_perusahaan) || empty($alamat_perusahaan) || empty($tanggal_polis) || empty($no_telepon_perusahaan) || empty($tanggal_polis_awal) || empty($tanggal_polis_akhir) || empty($jenis_pertanggungan)) {
            echo "<script>alert('Please fill all the fields')</script>";
            break;
        }

        $sql = "UPDATE insuransi SET no_polis = '$no_polis', nama_perusahaan = '$nama_perusahaan', alamat_perusahaan = '$alamat_perusahaan', tanggal_polis = '$tanggal_polis', no_telepon_perusahaan = '$no_telepon_perusahaan', tanggal_polis_awal = '$tanggal_polis_awal', tanggal_polis_akhir = '$tanggal_polis_akhir', jenis_pertanggungan = '$jenis_pertanggungan' WHERE id_insuransi = $id";

        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "<script>alert('Failed to update insuransi')</script>";
        }

        $successMessage = 'Insuransi has been updated!';
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
                <h1>Update Insuransi</h1>
                <a href="/hospital_billing/src/insuransi/insuransi.php" class="bg-blues opacity-95 text-white btn hover:bg-blues hover:opacity-100">Back</a>
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
                <input type="hidden" name="id_insuransi" value="<?php echo $id; ?>">
                <div class="p-10">
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">No Polis</span>
                        </div>
                        <input type="text" name="no_polis" value="<?php echo ($no_polis); ?>" placeholder="Type here" class="input input-bordered w-full " required />
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">Nama Perusahaan</span>
                        </div>
                        <input type="text" name="nama_perusahaan" value="<?php echo ($nama_perusahaan); ?>" placeholder="Type here" class="input input-bordered w-full " required />
                    </label>
                    <div class="w-full flex gap-x-4">
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">Alamat Perusahaan</span>
                            </div>
                            <input type="text" name="alamat_perusahaan" value="<?php echo ($alamat_perusahaan); ?>" placeholder="Type here" class="input input-bordered w-full " required />
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">Tanggal Polis</span>
                            </div>
                            <input type="date" name="tanggal_polis" value="<?php echo ($tanggal_polis); ?>" placeholder="Type here" class="input input-bordered w-full " required />
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">No Telepon Perusahaan</span>
                            </div>
                            <input type="text" name="no_telepon_perusahaan" value="<?php echo ($no_telepon_perusahaan); ?>" placeholder="Type here" class="input input-bordered w-full " required />
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">Tanggal Polis Awal</span>
                            </div>
                            <input type="date" name="tanggal_polis_awal" value="<?php echo ($tanggal_polis_awal); ?>" placeholder="Type here" class="input input-bordered w-full " required />
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">Tanggal Polis Akhir</span>
                            </div>
                            <input type="date" name="tanggal_polis_akhir" value="<?php echo ($tanggal_polis_akhir); ?>" placeholder="Type here" class="input input-bordered w-full " required />
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">Jenis Pertanggungan</span>
                            </div>
                            <input type="text" name="jenis_pertanggungan" value="<?php echo ($jenis_pertanggungan); ?>" placeholder="Type here" class="input input-bordered w-full " required />
                        </label>
                    </div>
                    <div class="mt-4">
                        <button name="submit" type="submit" class="bg-blues opacity-95 text-white btn hover:bg-blues hover:opacity-100">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>