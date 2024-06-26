<?php
session_start();
require 'config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve book_id from POST request
    $book_id = $_POST['book_id'];
    
    // Check if the book is available
    $check = $pdo->prepare("SELECT available FROM books WHERE id = ?");
    $check->execute([$book_id]);
    $available = $check->fetchColumn();

    if ($available) {
        // Book is available, proceed with borrowing
        $user_id = $_SESSION['user_id'];
        $borrow_date = date('Y-m-d');

        try {
            // Begin transaction
            $pdo->beginTransaction();

            // Insert into loans table
            $stmt = $pdo->prepare("INSERT INTO loans (book_id, user_id, loan_date) VALUES (?, ?, ?)");
            $stmt->execute([$book_id, $user_id, $borrow_date]);

            // Update books table to mark the book as unavailable
            $update = $pdo->prepare("UPDATE books SET available = 0 WHERE id = ?");
            $update->execute([$book_id]);

            // Commit transaction
            $pdo->commit();

            // Return success message
            echo "success";
        } catch (Exception $e) {
            // Rollback transaction on error
            $pdo->rollBack();
            // Return error message
            echo "error";
        }
    } else {
        // Book is not available
        echo "unavailable";
    }
} else {
    // Redirect if accessed directly
    header('Location: dashboard.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Success</title>
<link rel="stylesheet" href="borrow_style.css">
</head>
<body>
<div class="success-container">
    <div class="success-box">
        <h2>Anda Berhasil Meminjam Buku!</h2>
        <p>Terima kasih telah melakukan peminjaman buku.</p>
        <a href="dashboard.php">Back to home</a>
    </div>
</div>
</body>
</html>
