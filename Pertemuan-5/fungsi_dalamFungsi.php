<?php
// Membuat fungsi
function hitungUmur($thn_lahir, $thn_sekarang) {
    $umur = $thn_sekarang - $thn_lahir;
    return $umur;
}

function perkenalan($nama, $salam="Assalamulaikum") {
    echo $salam.",";
    echo "Perkenalkan, nama saya ".$nama."<br/>";
    
    // Memanggil fungsi lain
    echo "Saya berusia ".hitungUmur(2003, 2024)."Tahun<br/>";
    echo "Senang berkenalan dengan Anda<br/>";
}

// Memanggil fungsi perkenalan
perkenalan("Agung");

?>