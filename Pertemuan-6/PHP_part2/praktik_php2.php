<?php
function perkenalan($nama, $salam) {
    echo $salam.", ";
    echo "Perkenalkan, nama saya ".$nama."<br/>";
    echo "Senang berkenalan dengan Anda<br/>";
}

perkenalan("Agung", "Hallo");

$saya = "Nugroho";
$ucapSalam = "Selamat Pagi";

perkenalan($saya, $ucapSalam);
?>