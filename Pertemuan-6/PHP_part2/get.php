<?php

$nama = @$_GET['nama']; // Tanda @ agar tidak ada peringatan error ketika key-nya kosong
$usia = @$_GET['usia']; // Tanda @ agar tidak ada peringatan error ketika key-nya kosong

echo "Halo {$nama}! Apakah benar anda berusia {$usia} tahun?";
?>