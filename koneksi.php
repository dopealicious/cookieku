<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cookieku";

// Membuat koneksi
$koneksi = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi
if (!$koneksi) {
  die("Koneksi gagal: " . mysqli_connect_error());
}
?>
