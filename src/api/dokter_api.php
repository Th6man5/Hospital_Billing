<?php
include('../database/database.php');

$sql = "SELECT * FROM dokter";
$result = mysqli_query($conn, $sql);

$data = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}

echo json_encode($data);

mysqli_close($conn);