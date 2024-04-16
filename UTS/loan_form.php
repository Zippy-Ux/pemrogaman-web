<?php
session_start();
require 'config/db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi dan proses data form jika disubmit
    if (isset($_POST['book_id'], $_POST['loan_date'], $_POST['return_date'])) {
        $bookId = $_POST['book_id'];
        $loanDate = $_POST['loan_date'];
        $returnDate = $_POST['return_date'];
        
        // Proses data form, misalnya, simpan ke database
        $stmt = $pdo->prepare("INSERT INTO loans (book_id, user_id, loan_date, return_date) VALUES (?, ?, ?, ?)");
        $stmt->execute([$bookId, $_SESSION['user_id'], $loanDate, $returnDate]);
        
        // Setelah proses selesai, arahkan kembali ke dashboard
        header('Location: dashboard.php');
        exit;
    } else {
        echo "Invalid form data!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Loan Form</title>
<link rel="stylesheet" type="text/css" href="styleLoanForm.css">
</head>
<body>
<div class="container">
    <h1>Loan Book</h1>
    <form method="post">
        <label for="book_id">Book:</label>
        <select name="book_id" id="book_id">
            <?php
            $stmt = $pdo->query("SELECT * FROM books WHERE id NOT IN (SELECT book_id FROM loans WHERE return_date IS NULL)");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $row['id'] . "'>" . htmlspecialchars($row['title']) . "</option>";
            }
            ?>
        </select>
        <label for="loan_date">Loan Date:</label>
        <input type="date" name="loan_date" id="loan_date" required>
        <label for="return_date">Return Date:</label>
        <input type="date" name="return_date" id="return_date" required>
        <button type="submit">Submit</button>
    </form>
</div>
</body>
</html>
