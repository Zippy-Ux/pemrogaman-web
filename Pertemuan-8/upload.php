<?php
if (isset($_POST["submit"])) {
    $targetDirectory = "documents/"; // Direktori tujuan untuk menyimpan file
    $targetFile = $targetDirectory . basename($_FILES["documentToUpload"]["name"]);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $allowedExtensions = array("txt", "pdf", "doc", "docx");


    $maxFileSized = 10 * 1024 * 1024;

    if (in_array($fileType, $allowedExtensions)  && $_FILES["documentToUpload"]["size"] <= $maxFileSized) {
        if (move_uploaded_file($_FILES["documentToUpload"]["tmp_name"], $targetFile)) {
            echo "Dokumen berhasil diunggah";
        } else {
            echo "Gagal mengunggah dokumen.";
        }
    } else {
        echo "File tidak valid atau melebihi ukuran meksimum yang diizinkan.";
    }
}
?>