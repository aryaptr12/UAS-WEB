<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "ecommerce";

$conn = mysqli_connect($host, $user, $pass, $db)
    or die("Koneksi database gagal");
?>