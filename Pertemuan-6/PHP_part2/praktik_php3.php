<?php
function perkenalan($nama, $salam="Assalamulaikum") {
    echo $salam.", ";
    echo "Perkenalkan, nama saya ".$nama."<br/>";
    echo "Senang berkenalan dengan Anda<br/>";
}

// Memanggil fungsi yang sudah dibuat
perkenalan("Agung", "Hallo");

echo "<hr>";

$saya = "Nugroho";
$ucapSalam = "Selamat Pagi";

// Memanggil lagi tanpa mengisi parameter salam
perkenalan($saya, $ucapSalam);
?>