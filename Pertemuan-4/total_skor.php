<?php
$skor = [300, 600, 450, 700];

$totalSkor = 0;
foreach ($skor as $nilai) {
    $totalSkor += $nilai;
}

echo "Total skor pemain adalah: $totalSkor <br>";
echo "Apakah pemain mendapatkan hadiah tambahan? ";
if ($totalSkor > 500) {
    echo "YA\n";
} else {
    echo "TIDAK\n";
}
?>
