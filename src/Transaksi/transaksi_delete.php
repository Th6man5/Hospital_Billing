<?php
if (isset($_GET['id'])) {
    include('../database/database.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM transaksi WHERE id_transaksi = $id";
    if (mysqli_query($conn, $sql)) {
        header('Location: transaksi.php');
    } else {
        echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
    }
    mysqli_close($conn);
}
