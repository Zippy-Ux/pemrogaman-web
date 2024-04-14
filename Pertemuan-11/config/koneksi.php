<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "prakwebdb");

// Periksa koneksi
if (!$koneksi) {
    // Log error ke file log sistem, bukan menampilkan ke pengguna
    error_log("Koneksi database gagal: " . mysqli_connect_error());
    // Mungkin tampilkan pesan yang lebih umum kepada pengguna
    die("Koneksi database gagal. Silakan coba lagi nanti.");
}

// Mengatur charset menjadi 'utf8' untuk mencegah masalah encoding
mysqli_set_charset($koneksi, "utf8");
?>
