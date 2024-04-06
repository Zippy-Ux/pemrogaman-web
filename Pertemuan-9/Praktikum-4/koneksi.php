<?php
$host = "localhost"; // atau IP server Anda
$username = "root"; // ganti dengan username database Anda
$password = ""; // ganti dengan password database Anda
$dbname = "prakwedb"; // nama database

// Membuat koneksi
$connect = new mysqli($host, $username, $password, $dbname);

// Cek koneksi
if ($connect->connect_error) {
    die("Koneksi gagal: " . $connect->connect_error);
}

echo "Koneksi berhasil ";
?>
