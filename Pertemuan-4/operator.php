<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

echo "Penjumlahan: {$hasilTambah} <br>";
echo "Pengurangan: {$hasilKurang} <br>";
echo "Perkalian: {$hasilKali} <br>";
echo "Pembagian: {$sisaBagi} <br>";
echo "Hasil sisa bagi: {$sisaBagi} <br>";
echo "Hasil pangkat: {$pangkat} <br><br>";

$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

echo "Hasil Sama: {$hasilSama} <br>";
echo "Hasil tidak sama: {$hasilTidakSama} <br>";
echo "Hasil lebih kecil: {$hasilLebihKecil} <br>";
echo "Hasil lebih besar: {$hasilLebihBesar} <br>";
echo "Hasil lebih kecil sama: {$hasilLebihKecilSama} <br>";
echo "Hasil lebih besar sama: {$hasilLebihBesarSama} <br><br>";

$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo "Hasil Logika AND: {$hasilAnd} <br>";
echo "Hasil Logika OR: {$hasilOr} <br>";
echo "Hasil Logika NOT A: {$hasilNotA} <br>";
echo "Hasil Logika NOT B: {$hasilNotB} <br><br>";

$penugasanPenjumlahan = $a += $b;
$penugasanPengurangan = $a -= $b;
$penugasanPerkalian = $a *= $b;
$penugasanPembagian = $a /= $b;
$penugasanSisaBagi = $a %= $b;

echo "Hasil Penugasan Penjumlahan: {$penugasanPenjumlahan} <br>";
echo "Hasil Penugasan Pengurangan: {$penugasanPengurangan} <br>";
echo "Hasil Penugasan Perkalian: {$penugasanPerkalian} <br>";
echo "Hasil Penugasan Pembagian: {$penugasanPembagian} <br>";
echo "Hasil Penugasan Sisa Bagi: {$penugasanSisaBagi} <br><br>";

$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;

echo "Hasil Identik: {$hasilIdentik} <br>";
echo "Hasil Tidak Identik: {$hasilTidakIdentik} <br>";
?>