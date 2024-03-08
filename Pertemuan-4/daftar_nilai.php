<?php
$daftarNilai = [
    'Matematika' => [
        ['Alice', 85],
        ['Bob', 92],
        ['Charlie', 78],
        ['David', 64],
        ['Eva', 90]
    ],
];

$mataKuliah = 'Matematika';

$totalNilai = 0;
$jumlahSiswa = count($daftarNilai[$mataKuliah]);
foreach ($daftarNilai[$mataKuliah] as $siswa) {
    $totalNilai += $siswa[1];
}

$rataRataKelas = $totalNilai / $jumlahSiswa;

$nilaiLulus = [];
foreach ($daftarNilai[$mataKuliah] as $siswa) {
    if ($siswa[1] > $rataRataKelas) {
        $nilaiLulus[] = $siswa[0] . " (" . $siswa[1] . ")"; 
    }
}

echo "Daftar nilai siswa yang mencapai nilai di atas rata-rata kelas ($rataRataKelas):\n";
echo implode(', ', $nilaiLulus);
?>
