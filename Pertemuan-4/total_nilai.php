<?php
$nilaiSiswa = [85, 92, 58, 64, 90, 55, 88, 79, 70, 96];

$nilaiTertinggiPertama = 0;
$nilaiTertinggiKedua = 0;
$nilaiTerendahPertama = 100;
$nilaiTerendahKedua = 100;

foreach ($nilaiSiswa as $nilai) {
    if ($nilai > $nilaiTertinggiPertama) {
        $nilaiTertinggiKedua = $nilaiTertinggiPertama;
        $nilaiTertinggiPertama = $nilai;
    } elseif ($nilai > $nilaiTertinggiKedua) {
        $nilaiTertinggiKedua = $nilai;
    }

    if ($nilai < $nilaiTerendahPertama) {
        $nilaiTerendahKedua = $nilaiTerendahPertama;
        $nilaiTerendahPertama = $nilai;
    } elseif ($nilai < $nilaiTerendahKedua) {
        $nilaiTerendahKedua = $nilai;
    }
}

$totalNilai = array_sum($nilaiSiswa) - ($nilaiTertinggiPertama + $nilaiTertinggiKedua + $nilaiTerendahPertama + $nilaiTerendahKedua);

$jumlahNilai = count($nilaiSiswa) - 4;

$rataRata = $totalNilai / $jumlahNilai;

echo "Nilai rata-rata setelah mengabaikan dua nilai tertinggi dan terendah adalah: " . round($rataRata, 2);

?>
