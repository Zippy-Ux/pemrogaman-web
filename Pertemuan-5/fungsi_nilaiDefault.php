<?php
function perkenalan($nama, $salam="Assalamulaikum") {
    echo $salam.",";
    echo "Perkenalkan, nama saya ".$nama."<br/>";
    echo "Senang berkenalan dengan Anda<br/>";
}

// Memanggil fungsi yang sudah di buat
perkenalan("Hamdana", "Hallo");

echo "<hr>";

$saya = "Agung";
$ucapSalam = "Selamat Pagi";

perkenalan($saya);
?>