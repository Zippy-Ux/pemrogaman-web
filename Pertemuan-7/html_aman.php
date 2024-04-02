<?php
// Inisialisasi variabel untuk menyimpan pesan kesalahan atau sukses
$pesan = '';

// Mengecek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil input email dari form
    $email = $_POST['email'] ?? '';

    // Memvalidasi email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Email valid, lanjutkan dengan pengolahan email yang aman
        $pesan = "<p style='color: green;'>Email valid: " . htmlspecialchars($email) . "</p>";
    } else {
        // Tangani input yang tidak valid
        $pesan = "<p style='color: red;'>Email tidak valid. Silakan coba lagi.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Validasi Email</title>
</head>
<body>
    <h2>Form Validasi Email</h2>
    <!-- Menampilkan pesan kesalahan atau sukses -->
    <?php echo $pesan; ?>

    <!-- Form untuk inputan pengguna -->
    <form method="POST" action="">
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
