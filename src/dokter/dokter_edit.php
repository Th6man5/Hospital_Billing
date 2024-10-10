<?php
include('../database/database.php');

$nama = $jenis_kelamin = $tanggal_lahir = $no_telepon = $email = $alamat = $spesialis = '';

$successMessage = '';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['id'])) {
        header('Location: /hospital_billing/src/dokter/dokter.php');
        exit;
    }

    $id = $_GET['id'];

    $sql = "SELECT * FROM dokter WHERE id_dokter = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        header('Location: /hospital_billing/src/dokter/dokter.php');
        exit;
    }

    $nama = $row['nama'];
    $jenis_kelamin = $row['jenis_kelamin'];
    $tanggal_lahir = $row['tanggal_lahir'];
    $no_telepon = $row['no_telepon'];
    $email = $row['email'];
    $alamat = $row['alamat'];
    $spesialis = $row['spesialis'];
} else {
    $id = $_POST['id_dokter'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $no_telepon = $_POST['no_telepon'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $spesialis = $_POST['spesialis'];

    do {
        if (empty($nama) || empty($jenis_kelamin) || empty($tanggal_lahir) || empty($no_telepon) || empty($email) || empty($alamat) || empty($spesialis)) {
            echo "<script>alert('Please fill all the fields')</script>";
            break;
        }

        $sql = "UPDATE dokter SET nama = '$nama', jenis_kelamin = '$jenis_kelamin', tanggal_lahir = '$tanggal_lahir', no_telepon = '$no_telepon', email = '$email', alamat = '$alamat', spesialis = '$spesialis' WHERE id_dokter = $id";

        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "<script>alert('Failed to update insuransi')</script>";
        }

        $successMessage = 'Dokter has been updated!';
    } while (false);
}
?>

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
        <div class="p-4 ">
            <div class="flex items-center justify-between">
                <h1>Update Dokter</h1>
                <a href="/hospital_billing/src/dokter/dokter.php" class="bg-blues opacity-95 text-white btn hover:bg-blues hover:opacity-100">Back</a>
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
                <input type="hidden" name="id_dokter" value="<?php echo $id; ?>">
                <div class="p-10">
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">Nama</span>
                        </div>
                        <input type="text" name="nama" value="<?php echo ($nama); ?>" placeholder="Type here" class="input input-bordered w-full " required />
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text text-xl">Jenis Kelamin</span>
                        </div>
                        <input type="text" name="jenis_kelamin" placeholder="Type here" class="input input-bordered w-full " value="<?php echo ($jenis_kelamin); ?>" required />
                    </label>
                    <div class="w-full flex gap-x-4">
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">Tanggal Lahir</span>
                            </div>
                            <input type="date" name="tanggal_lahir" placeholder="Type here" class="input input-bordered w-full " value="<?php echo ($tanggal_lahir); ?>" required />
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">No Telepon</span>
                            </div>
                            <input type="text" name="no_telepon" placeholder="Type here" class="input input-bordered w-full " value="<?php echo ($no_telepon); ?>" required />
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">Email</span>
                            </div>
                            <input type="text" name="email" value="<?php echo ($email); ?>" placeholder="Type here" class="input input-bordered w-full " required />
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">Alamat</span>
                            </div>
                            <input type="text" value="<?php echo ($alamat); ?>" name="alamat" placeholder="Type here" class="input input-bordered w-full " required />
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">Spesialis</span>
                            </div>
                            <input type="text" value="<?php echo ($spesialis); ?>" name="spesialis" placeholder="Type here" class="input input-bordered w-full " required />
                        </label>
                    </div>
                    <div class="mt-4">
                        <button name="submit" type="submit" class="bg-blues bg-opacity-95 text-white btn hover:bg-blues hover:bg-opacity-100">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>