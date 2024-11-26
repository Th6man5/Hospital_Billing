<?php

$host = getenv('DB_HOST') ?: 'mysql';
$user = getenv('DB_USER') ?: 'root';   
$pass = getenv('DB_PASSWORD') ?: 'pembayaran';    
$db = getenv('DB_NAME') ?: 'hospital_billing';  

// Membuat koneksi
$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

