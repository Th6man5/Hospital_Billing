<?php
include('../database/database.php');

$nama = $no_telpon = $jenis_kelamin = $tempat_lahir = $tanggal_lahir = $id_insuransi = '';

$successMessage = '';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['id'])) {
        header('Location: /hospital_billing/src/pasien/pasien.php');
        exit;
    }

    $id = $_GET['id'];

    $sql = "SELECT * FROM pasien WHERE id_pasien = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        header('Location: /hospital_billing/src/pasien/pasien.php');
        exit;
    }

    $nama = $row['nama'];
    $no_telpon = $row['no_telpon'];
    $jenis_kelamin = $row['jenis_kelamin'];
    $tempat_lahir = $row['tempat_lahir'];
    $tanggal_lahir = $row['tanggal_lahir'];
    $id_insuransi = $row['id_insuransi'];
} else {
    $id = $_POST['id_pasien'];
    $nama = $_POST['nama'];
    $no_telpon = $_POST['no_telpon'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $id_insuransi = $_POST['id_insuransi'];

    do {
        if (empty($nama) || empty($no_telpon) || empty($jenis_kelamin) || empty($tempat_lahir) || empty($tanggal_lahir) || empty($id_insuransi)) {
            echo "<script>alert('Please fill all the fields')</script>";
            break;
        }

        $sql = "UPDATE pasien SET nama = '$nama', no_telpon = '$no_telpon', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', id_insuransi = '$id_insuransi' WHERE id_pasien = $id";

        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "<script>alert('Failed to update pasien')</script>";
        }

        $successMessage = 'pasien has been updated!';
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
                <h1>Update Pasien</h1>
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
                <input type="hidden" name="id_pasien" value="<?php echo $id; ?>">
                <div class="p-10">
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">Nama</span>
                        </div>
                        <input type="text" name="nama" value="<?php echo $nama; ?>" placeholder="Type here" class="input input-bordered w-full " required />
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">no_telpon</span>
                        </div>
                        <input type="text" name="no_telpon" value="<?php echo $no_telpon; ?>" placeholder="Type here" class="input input-bordered w-full " required />
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
                            <span class="label-text text-xl">tempat_lahir</span>
                        </div>
                        <input type="text" name="tempat_lahir" value="<?php echo $tempat_lahir; ?>" placeholder="Type here" class="input input-bordered w-full " required />
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">tanggal_lahir</span>
                        </div>
                        <input type="date" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>" placeholder="Type here" class="input input-bordered w-full " required />
                    </label>
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
                        <button name="submit" type="submit" class="bg-blues opacity-95 text-white btn hover:bg-blues hover:opacity-100">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>