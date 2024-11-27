<?php

$host = "db";
$port = 3306; 
$user = "root";
$pass = "";
$db = "hospital_billing";

$conn = mysqli_connect($host, $user, $pass, $db, $port);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";
