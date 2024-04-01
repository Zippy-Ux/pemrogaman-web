<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h2>Array Terindeks</h2>
    <?php
        $Listdosen=["Elok Nur Hamdana", "Unggul Pamenang", "Bagas Nugraha"];

        // Menggunakan perulangan for
        for ($i = 0; $i < count($Listdosen); $i++) {
            echo $Listdosen[$i] . "<br>";
        }

        // Menggunakan perulangan foreach
        foreach ($Listdosen as $dosen) {
            echo $dosen . "<br>";
        }
    ?>
</body>
</html>
