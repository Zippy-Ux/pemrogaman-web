<?php
$jumlahKursi = 45;
$kursiTerisi = 28;

$kursiKosong = $jumlahKursi - $kursiTerisi;

$presentasiKursiKosong = ($kursiKosong / $jumlahKursi) * 100;

echo "Presentase kursi yang masih kosong: {$presentasiKursiKosong} %"
?>