<?php
session_start();
require 'config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve loan_id from POST request
    $loan_id = $_POST['loan_id'];
    
    // Get return date
    $return_date = date('Y-m-d');

    try {
        // Begin transaction
        $pdo->beginTransaction();

        // Update loans table with return date
        $stmt = $pdo->prepare("UPDATE loans SET return_date = ? WHERE id = ?");
        $stmt->execute([$return_date, $loan_id]);

        // Get book_id for the loan
        $book_id_stmt = $pdo->prepare("SELECT book_id FROM loans WHERE id = ?");
        $book_id_stmt->execute([$loan_id]);
        $book_id = $book_id_stmt->fetchColumn();

        // Update books table to mark the book as available
        $update = $pdo->prepare("UPDATE books SET available = 1 WHERE id = ?");
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
    // Redirect if accessed directly
    header('Location: dashboard.php');
    exit;
}
?>
