<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $errors = array();

    // Validasi nama
    if (empty($nama)) {
        $errors[] = "Nama harus diisi.";
    }

    // Validasi email
    if (empty($email)) {
        $errors[] = "Email harus diisi.";
    } elseif (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid.";
    }

    // Jika ada kesalahan validasi
    if (empty($errors)) {
        foreach ($errors as $error) {
            echo $error = "<br>";
        }
    } else {
        // Lanjutkan dengan pemrosesan data jika semua validasi berhasil
        // Misalnya, menyimpan ke database atau mengirim email
        echo "Data berhasil dikirim: Nama = $nama, Email = $email";
    }

    if (strlen($password) < 8) {
        echo "Password harus minimal 8 karakter.";
        exit; // Hentikan eksekusi lebih lanjut
    }

    // Lanjutkan proses jika password memenuhi kriteria
    echo "Validasi berhasil.";
}


?>