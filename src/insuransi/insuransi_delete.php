<?php
if (isset($_GET['id'])) {
    include('../database/database.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM insuransi WHERE id_insuransi = $id";
    if (mysqli_query($conn, $sql)) {
        header('Location: insuransi.php');
    } else {
        echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
    }
    mysqli_close($conn);
}
