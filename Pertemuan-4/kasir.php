<?php
$hargaProduk = 120000;

$diskonPersen = 20;

if ($hargaProduk > 100000) {
    $hargaSetelahDiskon = $hargaProduk - ($hargaProduk * ($diskonPersen / 100));
} else {
    $hargaSetelahDiskon = $hargaProduk;
}

echo "Harga setelah diskon: Rp {$hargaSetelahDiskon}";
?>
