<?php
include('../database/database.php');

$no_polis = $nama_perusahaan = $alamat_perusahaan = $tanggal_polis = $no_telepon_perusahaan = $tanggal_polis_awal = $tanggal_polis_akhir = $jenis_pertanggungan = '';

$successMessage = '';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['id'])) {
        header('Location: /hospital_billing/src/layanan/layanan.php');
        exit;
    }

    $id = $_GET['id'];

    $sql = "SELECT * FROM layanan WHERE id_layanan = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        header('Location: /hospital_billing/src/layanan/layanan.php');
        exit;
    }

    $nama_layanan = $row['nama_layanan'];
    $harga = $row['harga'];
    $id_dokter = $row['id_dokter'];
} else {
    $id = $_POST['id_layanan'];
    $nama_layanan = $_POST['nama_layanan'];
    $harga = $_POST['harga'];
    $id_dokter = $_POST['id_dokter'];

    do {
        if (empty($nama_layanan) || empty($harga) || empty($id_dokter)) {
            echo "<script>alert('Please fill all the fields')</script>";
            break;
        }

        $sql = "UPDATE layanan SET nama_layanan = '$nama_layanan', harga = '$harga', id_dokter = '$id_dokter' WHERE id_layanan = $id";

        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "<script>alert('Failed to update layanan')</script>";
        }

        $successMessage = 'layanan has been updated!';
    } while (false);
}
?>
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
                <h1>Update Layanan</h1>
                <a href="layanan.php" class="bg-blues opacity-95 text-white btn hover:bg-blues hover:opacity-100">Back</a>
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
                <input type="hidden" name="id_layanan" value="<?php echo $id; ?>">
                <div class="p-10">
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">Nama Layanan</span>
                        </div>
                        <input type="text" name="nama_layanan" value="<?php echo $nama_layanan; ?>" placeholder=" Type here" class="input input-bordered w-full " required />
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">Harga</span>
                        </div>
                        <input type="number" name="harga" value="<?php echo $harga; ?>" placeholder=" Type here" class="input input-bordered w-full " required />
                    </label>
                        <div class="label">
                            <span class="label-text text-xl">Nama Dokter</span>
                        </div>
                    <select name="id_dokter" class="select select-bordered w-full">
                        <?php
                        include('../database/database.php');
                        $sql = "SELECT * FROM dokter";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['id_dokter'] . '">' . $row['nama'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                    <div class="mt-4">
                        <button name="submit" type="submit" class="bg-blues opacity-95 text-white btn hover:bg-blues hover:opacity-100">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>